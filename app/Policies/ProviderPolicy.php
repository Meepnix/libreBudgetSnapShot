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

    public function before($user, $provider)
    {
        if (Auth::user()->type === "superadmin") {
            return true;
        }
    }

    public function isAdmin(User $user, Provider $provider)
    {
        return Auth::user()->provider_id === $provider->id && Auth::user()->type === "admin";
    }

    public function isUser(User $user, Provider $provider)
    {
        return Auth::user()->id === $user->id;
    }

}
