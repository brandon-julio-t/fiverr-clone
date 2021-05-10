<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GigCategory
 *
 * @property int $id
 * @property string $name
 * @method static Builder|GigCategory newModelQuery()
 * @method static Builder|GigCategory newQuery()
 * @method static Builder|GigCategory query()
 * @method static Builder|GigCategory whereId($value)
 * @method static Builder|GigCategory whereName($value)
 * @mixin Eloquent
 */
class GigCategory extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
