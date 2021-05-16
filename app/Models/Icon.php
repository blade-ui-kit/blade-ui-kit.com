<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

final class Icon extends Model
{
    use Searchable;

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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'keywords' => 'array',
    ];

    public function set(): BelongsTo
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }

    public static function relatedIcons(self $icon): Collection
    {
        return static::search(implode('-', $icon->keywords))
            ->get()
            ->where('id', '!=', $icon->id);
    }

    public function toSearchableArray()
    {
        return $this->only('id', 'icon_set_id', 'keywords');
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
