<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Provider;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
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


    public function show(User $user)
    {
        return Auth::user()->provider_id === $provider->id && Auth::user()->type === "admin";
    }
}
