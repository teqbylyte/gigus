<?php

namespace App\Policies;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GigPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the gig by checking if they're not staff.
     *
     * @param User $user
     * @param Gig $gig
     * @return Response|bool
     */
    public function update(User $user, Gig $gig): Response|bool
    {
        return $user->role != 'staff';
    }

    /**
     * Determine whether the user can delete the gig by checking if they're not staff.
     *
     * @param User $user
     * @param Gig $gig
     * @return Response|bool
     */
    public function delete(User $user, Gig $gig): Response|bool
    {
        return $user->role != 'staff';
    }
}
