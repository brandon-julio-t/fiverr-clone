<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GigViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Gig $gig
     * @return Application|Factory|View
     */
    public function __invoke(Request $request, Gig $gig)
    {
        $reviews = $gig->gigReviews()->orderByDesc('created_at')->paginate(5);
        return view('gig.view-gig', compact('gig', 'reviews'));
    }
}
