<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('login');
    }
}
