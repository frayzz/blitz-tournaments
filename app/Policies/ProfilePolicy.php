<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function edit(User $currentUser, User $user): bool
    {
        return $currentUser->id === $user->id;
    }
}
