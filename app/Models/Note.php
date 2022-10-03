<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int category_id
 * @property string title
 * @property string content
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property CategoryNote category
 *
 * @method static create(array $array)
 * @method static Builder search($searchTerm)
 */
class Note extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'content',
    ];

    public function scopeSearch(Builder $builder, $searchTerm): Builder
    {
        return $builder
            ->where(fn (Builder $query) => $query
                ->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('content', 'LIKE', '%' . $searchTerm . '%')
            );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryNote::class);
    }
}
