<?php

namespace App\Models;

use App\Events\GigImageDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
