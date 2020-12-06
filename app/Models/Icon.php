<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

final class Icon extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function set(): BelongsTo
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }

    public static function search(string $search): Collection
    {
        $matchesKeywords = function ($query) use ($search) {
            Str::of($search)->lower()->explode(' ')->filter()->each(function (string $keyword) use ($query) {
                $query->where('keywords', 'like', "-%{$keyword}%-");
            });

            $query->limit(500);
        };

        return self::query()->when($search !== '', $matchesKeywords, function ($query) {
            $query->inRandomOrder()->limit(72);
        })->get();
    }

    public static function relatedIcons(self $icon): Collection
    {
        $hasRelatedKeywords = function ($query) use ($icon) {
            Str::of($icon->keywords)->lower()->explode('-')->filter()->each(function (string $keyword) use ($query) {
                $query->orWhere('keywords', 'like', "-%{$keyword}%-");
            });
        };

        return self::where($hasRelatedKeywords)
            ->where('id', '!=', $icon->id)
            ->inRandomOrder()
            ->limit(20)
            ->get();
    }
}
