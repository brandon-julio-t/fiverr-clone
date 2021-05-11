<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ProfileUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
            if (Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $data['profile_picture'] = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        $user->update($data);

        return redirect()->route('view-profile', $user);
    }
}
