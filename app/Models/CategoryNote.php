<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class CategoryNote extends Model
{
    protected $fillable = [
        'title',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'category_id');
    }
}
