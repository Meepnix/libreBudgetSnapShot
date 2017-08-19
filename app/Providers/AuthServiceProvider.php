<?php

namespace App\Providers;

use App\Provider;
use App\User;
use App\Policies\UserPolicy;
use App\Policies\ProviderPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //\App\Models\Provider::class => \App\Policies\ProviderPolicy::class,
        User::class => UserPolicy::class,
        Provider::class => ProviderPolicy::class,

    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
