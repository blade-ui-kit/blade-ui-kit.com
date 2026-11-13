<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Searchable;

final class Icon extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'keywords' => 'array',
            'overwrite_fill' => 'boolean',
        ];
    }

    public function set(): BelongsTo
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }

    public static function relatedIcons(self $icon): Collection
    {
        $search = implode('-', $icon->keywords);
        $version = Cache::get('icons:cache-version', '1');
        $key = 'icons:related:'.hash('sha256', config('scout.driver').':'.$search);

        // Share results between icon variants, but never cache HTML, sessions or arbitrary searches.
        // Keep keys stable across imports so file caches do not accumulate obsolete generations.
        $cached = Cache::get($key);
        if (($cached['version'] ?? null) !== $version) {
            $cached = [
                'version' => $version,
                'ids' => self::search($search)->take(21)->get()->modelKeys(),
            ];
            Cache::put($key, $cached, now()->addHour());
        }
        $ids = $cached['ids'];

        return self::query()->findMany($ids)
            ->sortBy(fn (self $related) => array_search($related->id, $ids))
            ->where('id', '!=', $icon->id)
            ->take(20)
            ->values();
    }

    public function toSearchableArray()
    {
        return $this->only('id', 'icon_set_id', 'keywords');
    }

    public function scopeWithSet(Builder $query, string $set): Builder
    {
        return $query->when(! empty($set), fn ($query) => $query->where('icon_set_id', $set));
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
