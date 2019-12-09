<?php

namespace App\Providers;

use App\Models\Master\Item;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Repositories\User\UserInterface', 'App\Repositories\User\UserRepository');
        $this->app->bind('App\Repositories\Common\IDateUtil', 'App\Repositories\Common\DateUtil');
        $this->app->bind('App\Repositories\Common\ISelectList', 'App\Repositories\Common\SelectList');
        $this->app->bind('App\Repositories\PA\IPAPremium', 'App\Repositories\PA\PAPremium');
        $this->app->bind('App\Repositories\Travel\ITravelPremium', 'App\Repositories\Travel\TravelPremium');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share(['languages'=> Item::where('item_tabl','=','TV410')->get()]);
    }
}
