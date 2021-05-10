<?php

namespace App\Models;

use Database\Factories\GigReviewFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\GigReview
 *
 * @property int $id
 * @property int $gig_id
 * @property int $user_id
 * @property int $rating
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Gig $gig
 * @property-read User $user
 * @method static GigReviewFactory factory(...$parameters)
 * @method static Builder|GigReview newModelQuery()
 * @method static Builder|GigReview newQuery()
 * @method static Builder|GigReview query()
 * @method static Builder|GigReview whereBody($value)
 * @method static Builder|GigReview whereCreatedAt($value)
 * @method static Builder|GigReview whereGigId($value)
 * @method static Builder|GigReview whereId($value)
 * @method static Builder|GigReview whereRating($value)
 * @method static Builder|GigReview whereUpdatedAt($value)
 * @method static Builder|GigReview whereUserId($value)
 * @mixin Eloquent
 */
class GigReview extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function gig(): BelongsTo
    {
        return $this->belongsTo(Gig::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
