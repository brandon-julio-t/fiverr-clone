<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GigCategory $gigCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GigImage[] $gigImages
 * @property-read int|null $gig_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GigReview[] $gigReviews
 * @property-read int|null $gig_reviews_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\GigFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gig query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereBasicPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereBasicPriceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereGigCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig wherePremiumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig wherePremiumPriceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereStandardPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereStandardPriceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gig whereUserId($value)
 */
	class Gig extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GigCategory
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|GigCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|GigCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigCategory whereName($value)
 */
	class GigCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GigImage
 *
 * @property int $id
 * @property int $gig_id
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gig $gig
 * @method static \Database\Factories\GigImageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage whereGigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigImage whereUpdatedAt($value)
 */
	class GigImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GigReview
 *
 * @property int $id
 * @property int $gig_id
 * @property int $user_id
 * @property int $rating
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gig $gig
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\GigReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereGigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigReview whereUserId($value)
 */
	class GigReview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GigTransaction
 *
 * @property int $id
 * @property int $user_id
 * @property int $gig_id
 * @property int $price
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereGigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GigTransaction whereUserId($value)
 */
	class GigTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $profile_picture
 * @property string|null $about
 * @property string|null $description
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gig[] $gigs
 * @property-read int|null $gigs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

