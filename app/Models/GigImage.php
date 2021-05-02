<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GigImage extends Model
{
    use HasFactory;

    public function gig(): BelongsTo
    {
        return $this->belongsTo(Gig::class);
    }
}
