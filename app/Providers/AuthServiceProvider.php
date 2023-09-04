<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        foreach (config('global.admin') as $ability => $value) {
            Gate::define($ability, function ($auth) use ($ability) {
                if (Auth::guard('admin')->check()) {
                    return $auth->hasAbility($ability);
                }
            });
        }

        foreach (config('global.service') as $ability => $value) {
            Gate::define($ability, function ($auth) use ($ability) {
                if (Auth::guard('service')->check()||Auth::guard('service_admin')->check()) {
                    return $auth->hasAbility($ability);
                }
            });
        }
        $this->registerPolicies();
    }
}
