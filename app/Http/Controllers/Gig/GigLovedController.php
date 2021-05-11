<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GigLovedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $gigs = $request->user()->lovedGigs;
        return view('gig.loved-gig', compact('gigs'));
    }
}
