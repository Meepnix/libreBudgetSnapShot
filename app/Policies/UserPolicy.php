<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Provider;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function show(Provider $provider)
    {
        return Auth::user()->provider_id === $provider->id;
    }
}
