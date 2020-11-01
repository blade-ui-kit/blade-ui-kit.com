<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Icon;
use App\Models\IconSet;
use BladeUI\Icons\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

final class ImportIcons extends Command
{
    protected $signature = 'icons:import';

    protected $description = 'Command description';

    private array $sets;

    public function handle(Factory $factory): int
    {
        $this->sets = $factory->all();

        unset($this->sets['default']);

        $this->info('Starting to import icon sets...');

        DB::transaction(function () {
            Icon::query()->delete();

            IconSet::each(function (IconSet $iconSet) {
                $this->parseIcons($iconSet);
            });
        });

        $this->info('Successfully imported '.count($this->sets).' icon sets!');

        return 0;
    }

    private function parseIcons(IconSet $iconSet): void
    {
        $set = $this->sets[$iconSet->name];

        foreach (File::allFiles($set['path']) as $file) {
            $path = array_filter(explode('/', Str::after($file->getPath(), $set['path'])));
            $filename = implode('.', array_filter($path + [$file->getFilenameWithoutExtension()]));

            Icon::create([
                'icon_set_id' => $iconSet->id,
                'name' => $set['prefix'].'-'.$filename,
                'outlined' => $this->isOutlined($filename, $iconSet->outline_rule),
                'keywords' => $this->keywords($filename, $iconSet->ignore_rule),
            ]);
        }
    }

    private function keywords(string $string, ?string $rule): string
    {
        return '-'.Str::of($string)->when($rule !== null, function (Stringable $string) use ($rule) {
            return $string->replaceMatches($rule, '');
        }).'-';
    }

    private function isOutlined(string $string, ?string $rule): bool
    {
        if ($rule === null) {
            return false;
        }

        return Str::of($string)->match($rule)->isNotEmpty();
    }
}
