<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    function __invoke(LoginRequest $request): RedirectResponse
    {
        $credential = $request->only('email', 'password');
        $rememberMe = $request->boolean('remember_me');

        $isAuthenticated = Auth::attempt($credential, $rememberMe);

        if ($isAuthenticated) {
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Invalid Credentials']);
    }
}
