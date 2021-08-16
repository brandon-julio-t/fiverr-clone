<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use App\Models\GigImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class GigDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Gig $gig
     * @return RedirectResponse
     * @throws Throwable
     */
    public function __invoke(Request $request, Gig $gig): RedirectResponse
    {
        DB::transaction(function () use ($gig) {

            collect($gig->gigImages)->each(function (GigImage $image) {
                $image->delete();
            });

            $gig->delete();

        });

        session()->flash('announcement-success', 'Gig Deleted');
        return redirect()->route('view-profile', $request->user());
    }
}
