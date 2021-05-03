<?php

namespace App\Events;

use App\Models\GigImage;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GigImageDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(GigImage $gigImage)
    {
        if (Str::contains($gigImage->path, 'dummy')) {
            return;
        }

        Storage::disk('public')->delete($gigImage->path);
    }
}
