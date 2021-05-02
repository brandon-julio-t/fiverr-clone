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
 */
class Gig extends Model
{
    use HasFactory;

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
