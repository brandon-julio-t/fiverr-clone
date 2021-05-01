<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param User $user
     * @return Application|Factory|View
     */
    public function __invoke(Request $request, User $user)
    {
        return view('profile.edit-profile', compact('user'));
    }
}
