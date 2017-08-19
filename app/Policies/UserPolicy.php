<?php

namespace App\Policies;

use Auth;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function isUser(User $user)
    {
        return Auth::user()->id === $user->id;
        
    }
}
