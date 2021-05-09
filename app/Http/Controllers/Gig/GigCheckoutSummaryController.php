<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GigCheckoutSummaryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Gig $gig
     * @param string $type basic | standard | premium
     * @return Application|Factory|View
     */
    public function __invoke(Request $request, Gig $gig, string $type)
    {
        return view('gig.checkout-gig', compact('gig', 'type'));
    }
}
