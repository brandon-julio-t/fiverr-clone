<?php

namespace App\Policies;

use App\Models\Gig;
use App\Models\GigTransaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GigPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function view(User $user, Gig $gig): bool
    {
        return $gig->user->id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user != null;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function update(User $user, Gig $gig): bool
    {
        return $gig->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function delete(User $user, Gig $gig): bool
    {
        return $gig->user->id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function restore(User $user, Gig $gig): bool
    {
        return $gig->user->id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function forceDelete(User $user, Gig $gig): bool
    {
        return $gig->user->id == $user->id;
    }

    /**
     * Determine whether the user can add review to gig.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function review(User $user, Gig $gig): bool
    {
        return GigTransaction::where([
            'user_id' => $user->id,
            'gig_id' => $gig->id
        ])->first() != null;
    }

    /**
     * Determine whether the user can purchase the gig.
     *
     * @param User $user
     * @param Gig $gig
     * @return bool
     */
    public function purchase(User $user, Gig $gig): bool
    {
        return $user->id != $gig->user->id;
    }
}
