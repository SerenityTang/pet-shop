<?php

namespace App\Policies;

use App\Models\Mall\UserAddress;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAddressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the discussion.
     *
     * @param User $user
     * @param UserAddress $userAddress
     * @return bool
     */
    public function update(User $user, UserAddress $userAddress)
    {
        return $userAddress->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the discussion.
     *
     * @param User $user
     * @param UserAddress $userAddress
     * @return bool
     */
    public function delete(User $user, UserAddress $userAddress)
    {
        return $userAddress->user_id == $user->id;
    }
}
