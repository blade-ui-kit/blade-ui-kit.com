<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Livewire\IconSearch;
use App\Models\Icon;
use BladeUI\Icons\IconsManifest;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class IconCatalogTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['scout.driver' => 'collection']);
    }

    public function test_related_icons_are_bounded_ranked_and_exclude_each_variant_itself(): void
    {
        Icon::withoutSyncingToSearch(function () {
            foreach (range(1, 25) as $number) {
                Icon::create([
                    'icon_set_id' => 1,
                    'name' => 'test-'.$number,
                    'keywords' => ['catalogneedle'],
                    'outlined' => false,
                ]);
            }
        });

        $source = Icon::where('name', 'test-25')->firstOrFail();
        $variant = Icon::where('name', 'test-24')->firstOrFail();

        $this->assertSame(
            array_map(fn ($number) => 'test-'.$number, range(24, 5)),
            Icon::relatedIcons($source)->pluck('name')->all(),
        );
        $this->assertSame(
            array_merge(['test-25'], array_map(fn ($number) => 'test-'.$number, range(23, 5))),
            Icon::relatedIcons($variant)->pluck('name')->all(),
        );
    }

    public function test_related_results_expire_and_cached_ids_use_current_icon_data(): void
    {
        $source = $this->icon('heroicon-o-academic-cap', ['academic']);
        $related = $this->icon('heroicon-s-academic-cap', ['academic']);
        $this->assertSame([$related->id], Icon::relatedIcons($source)->modelKeys());

        $new = $this->icon('heroicon-m-academic-cap', ['academic']);
        $related->update(['overwrite_fill' => true]);

        $cached = Icon::relatedIcons($source);
        $this->assertSame([$related->id], $cached->modelKeys());
        $this->assertTrue($cached->first()->overwrite_fill);

        $this->travel(61)->minutes();
        $this->assertSame([$new->id, $related->id], Icon::relatedIcons($source)->modelKeys());
    }

    public function test_importing_icons_replaces_cached_ids_immediately(): void
    {
        $original = $this->app->bootstrapPath();
        $bootstrap = sys_get_temp_dir().'/icon-import-'.Str::uuid();
        $manifest = $bootstrap.'/cache/blade-icons.php';
        File::ensureDirectoryExists(dirname($manifest));
        $this->app->useBootstrapPath($bootstrap);

        try {
            foreach ([['o-heart', 's-heart'], ['o-heart', 's-heart', 'm-heart']] as $icons) {
                File::put($manifest, '<?php return '.var_export(['heroicons' => ['path' => [...$icons, 123]]], true).';');
                $this->app->instance(IconsManifest::class, new IconsManifest(new Filesystem, $manifest));

                $this->artisan('icons:import')->assertSuccessful();

                $this->assertDatabaseHas('icons', ['name' => 'heroicon-123', 'keywords' => '["123"]', 'outlined' => false]);
                $source = Icon::where('name', 'heroicon-o-heart')->firstOrFail();
                $expected = array_map(fn ($name) => 'heroicon-'.$name, array_slice($icons, 1));
                sort($expected);
                $this->assertSame($expected, Icon::relatedIcons($source)->pluck('name')->sort()->values()->all());
            }
        } finally {
            $this->app->useBootstrapPath($original);
            File::deleteDirectory($bootstrap);
        }
    }

    public function test_icon_pages_keep_private_responses_and_render_correct_svg_and_similar_links(): void
    {
        $source = $this->icon('heroicon-o-academic-cap', ['academic']);
        $related = $this->icon('heroicon-s-academic-cap', ['academic']);

        // The second response exercises the shared data cache, not a shared HTML response.
        foreach (range(1, 2) as $request) {
            $response = $this->get('/blade-icons/'.$source->name)
                ->assertOk()
                ->assertSee(svg($source->name, 'w-64 h-64')->toHtml(), false)
                ->assertSee('href="'.route('blade-icon', $related).'"', false)
                ->assertSee('composer require blade-ui-kit/blade-heroicons');

            $this->assertStringContainsString('private', $response->headers->get('Cache-Control'));
            $this->assertTrue($response->headers->has('Set-Cookie'));
        }

        $this->get('/blade-icons/not-a-real-icon')->assertNotFound();
        $this->get('/')->assertRedirect('/blade-icons');
    }

    public function test_catalogue_search_and_set_filters_remain_live(): void
    {
        $academic = $this->icon('heroicon-o-academic-cap', ['academic']);
        $this->icon('heroicon-o-heart', ['heart']);
        $otherSet = $this->icon('zondicon-education', ['academic'], 2);

        Livewire::test(IconSearch::class)
            ->assertViewHas('total', 3)
            ->set('search', 'academic')
            ->assertViewHas('icons', fn ($icons) => $icons->modelKeys() === [$otherSet->id, $academic->id])
            ->set('selectedSet', '1')
            ->assertViewHas('total', 2)
            ->assertViewHas('icons', fn ($icons) => $icons->modelKeys() === [$academic->id])
            ->set('search', 'nothing-matches')
            ->assertViewHas('icons', fn ($icons) => $icons->isEmpty())
            ->call('resetSearch')
            ->assertSet('search', '')
            ->assertViewHas('icons', fn ($icons) => $icons->count() === 2 && $icons->every(fn ($icon) => $icon->icon_set_id === 1));
    }

    private function icon(string $name, array $keywords, int $set = 1): Icon
    {
        return Icon::withoutSyncingToSearch(fn () => Icon::create([
            'icon_set_id' => $set,
            'name' => $name,
            'keywords' => $keywords,
            'outlined' => false,
        ]));
    }
}
