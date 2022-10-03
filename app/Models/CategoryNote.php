<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string title
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Note notes
 *
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
