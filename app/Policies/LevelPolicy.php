<?php

namespace App\Policies;

use App\Http\Middleware\isAdmin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization;

    // public function isAdmin(User $user)
    // {
    //     return $user->level !== 'administrator';
    // }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // public function isAdmin(User $user)
    // {
    //    return $user->isAdmin();
    // }
}
