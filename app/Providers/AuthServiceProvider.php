<?php

namespace App\Providers;

use App\Models\Auth\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Role::class => \App\Policies\RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        if(! $this->app->runningInConsole()){
            foreach (Permission::all() as $permission) {
                # code...
                Gate::define($permission->name, function ($user) use ($permission)
                {
                    # code...
                    return $user->hasPermission($permission);
                });
            }
        }
    }
}
