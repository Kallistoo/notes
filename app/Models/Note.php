<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class Note extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'content',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryNote::class);
    }
}
