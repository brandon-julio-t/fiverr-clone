<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static pluck(string $string)
 * @method static paginate(int $int)
 * @method static simplePaginate(int $int)
 * @method static find(array|string|null $id)
 * @method static create(array $data)
 * @method static orderBy(string $string, string $string1)
 * @property mixed user
 * @property mixed id
 * @property mixed gigImages
 * @property mixed basic_price
 * @property mixed standard_price
 * @property mixed premium_price
 */
class Gig extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gigCategory(): BelongsTo
    {
        return $this->belongsTo(GigCategory::class);
    }

    public function gigImages(): HasMany
    {
        return $this->hasMany(GigImage::class);
    }

    public function gigReviews(): HasMany
    {
        return $this->hasMany(GigReview::class);
    }
}
