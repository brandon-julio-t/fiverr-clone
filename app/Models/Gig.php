<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
