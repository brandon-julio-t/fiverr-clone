<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\GigTransaction
 *
 * @property int $id
 * @property int $user_id
 * @property int $gig_id
 * @property int $price
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|GigTransaction newModelQuery()
 * @method static Builder|GigTransaction newQuery()
 * @method static Builder|GigTransaction query()
 * @method static Builder|GigTransaction whereCreatedAt($value)
 * @method static Builder|GigTransaction whereGigId($value)
 * @method static Builder|GigTransaction whereId($value)
 * @method static Builder|GigTransaction wherePrice($value)
 * @method static Builder|GigTransaction whereType($value)
 * @method static Builder|GigTransaction whereUpdatedAt($value)
 * @method static Builder|GigTransaction whereUserId($value)
 * @mixin Eloquent
 */
class GigTransaction extends Model
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

    public function gig(): BelongsTo
    {
        return $this->belongsTo(Gig::class);
    }
}
