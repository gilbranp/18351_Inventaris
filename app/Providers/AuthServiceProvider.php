<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Level' => 'App\Policies\LevelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
{
    $this->registerPolicies();

    Gate::define('admin',function ($user){
        return $user->level === 'administrator';
    });
    // Gate::define('is-administrator', function ($user) {
    //     return $user->level === 'administrator';
    // });
}

}
