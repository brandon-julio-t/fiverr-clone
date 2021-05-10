<?php

namespace App\Models;

use App\Events\GigImageDeleted;
use Database\Factories\GigImageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\GigImage
 *
 * @property int $id
 * @property int $gig_id
 * @property string $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Gig $gig
 * @method static GigImageFactory factory(...$parameters)
 * @method static Builder|GigImage newModelQuery()
 * @method static Builder|GigImage newQuery()
 * @method static Builder|GigImage query()
 * @method static Builder|GigImage whereCreatedAt($value)
 * @method static Builder|GigImage whereGigId($value)
 * @method static Builder|GigImage whereId($value)
 * @method static Builder|GigImage wherePath($value)
 * @method static Builder|GigImage whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GigImage extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = ['deleted' => GigImageDeleted::class];

    public function gig(): BelongsTo
    {
        return $this->belongsTo(Gig::class);
    }
}
