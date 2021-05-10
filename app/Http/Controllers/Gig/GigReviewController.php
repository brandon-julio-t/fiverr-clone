<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Http\Requests\GigReviewRequest;
use App\Models\Gig;
use App\Models\GigReview;
use Illuminate\Http\RedirectResponse;

class GigReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param GigReviewRequest $request
     * @param Gig $gig
     * @return RedirectResponse
     */
    public function __invoke(GigReviewRequest $request, Gig $gig): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['gig_id'] = $gig->id;

        GigReview::create($data);

        return back()->with('announcement-success', 'Review posted');
    }
}
