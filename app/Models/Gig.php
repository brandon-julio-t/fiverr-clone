<?php

namespace App\Models;

use Database\Factories\GigFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Gig
 *
 * @property int $id
 * @property string $title
 * @property int $gig_category_id
 * @property int $user_id
 * @property string $about
 * @property int $basic_price
 * @property int $standard_price
 * @property int $premium_price
 * @property string $basic_price_description
 * @property string $standard_price_description
 * @property string $premium_price_description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read GigCategory $gigCategory
 * @property-read Collection|GigImage[] $gigImages
 * @property-read int|null $gig_images_count
 * @property-read Collection|GigReview[] $gigReviews
 * @property-read int|null $gig_reviews_count
 * @property-read User $user
 * @method static GigFactory factory(...$parameters)
 * @method static Builder|Gig newModelQuery()
 * @method static Builder|Gig newQuery()
 * @method static Builder|Gig query()
 * @method static Builder|Gig whereAbout($value)
 * @method static Builder|Gig whereBasicPrice($value)
 * @method static Builder|Gig whereBasicPriceDescription($value)
 * @method static Builder|Gig whereCreatedAt($value)
 * @method static Builder|Gig whereGigCategoryId($value)
 * @method static Builder|Gig whereId($value)
 * @method static Builder|Gig wherePremiumPrice($value)
 * @method static Builder|Gig wherePremiumPriceDescription($value)
 * @method static Builder|Gig whereStandardPrice($value)
 * @method static Builder|Gig whereStandardPriceDescription($value)
 * @method static Builder|Gig whereTitle($value)
 * @method static Builder|Gig whereUpdatedAt($value)
 * @method static Builder|Gig whereUserId($value)
 * @mixin Eloquent
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

    public function gigTransactions(): HasMany
    {
        return $this->hasMany(GigTransaction::class);
    }

    public function lovedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'loved_gigs');
    }
}
