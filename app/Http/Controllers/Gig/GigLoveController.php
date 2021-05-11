<?php

namespace App\Http\Controllers\Gig;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GigLoveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param User $user
     * @param Gig $gig
     * @return JsonResponse
     */
    public function __invoke(Request $request, User $user, Gig $gig): JsonResponse
    {
        $user->lovedGigs()->attach($gig);
        return response()->json();
    }
}
