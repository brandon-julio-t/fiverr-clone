<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GigEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Gig $gig
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function __invoke(Request $request, Gig $gig)
    {
        $this->authorize('update', $gig);
        return view('gig.edit-gig', compact('gig'));
    }
}
