<?php

namespace App\Policies;

use App\Models\GigReview;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GigReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user != null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param GigReview $gigReview
     * @return bool
     */
    public function view(User $user, GigReview $gigReview): bool
    {
        return $user != null && $gigReview != null;
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
     * @param GigReview $gigReview
     * @return bool
     */
    public function update(User $user, GigReview $gigReview): bool
    {
        return $user->id == $gigReview->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param GigReview $gigReview
     * @return bool
     */
    public function delete(User $user, GigReview $gigReview): bool
    {
        return $user->id == $gigReview->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param GigReview $gigReview
     * @return bool
     */
    public function restore(User $user, GigReview $gigReview): bool
    {
        return $user->id == $gigReview->user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param GigReview $gigReview
     * @return bool
     */
    public function forceDelete(User $user, GigReview $gigReview): bool
    {
        return $user->id == $gigReview->user->id;
    }
}
