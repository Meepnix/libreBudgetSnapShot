<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Provider;
use App\User;
use Auth;

class ProviderPolicy
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
    public function userIsAdmin(User $user, Provider $provider)
    {
        return Auth::user()->provider_id === $provider->id && Auth::user()->type === "admin";
    }

}
