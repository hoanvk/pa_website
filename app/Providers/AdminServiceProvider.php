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
        $this->app->bind('App\Repositories\Travel\ITravelPremium', 'App\Repositories\Travel\TravelPremium');
        $this->app->bind('App\Repositories\PA\IPAPremium', 'App\Repositories\PA\PAPremium');
        $this->app->bind('App\Repositories\Common\IPaymentRepo', 'App\Repositories\Common\PaymentRepo');
        $this->app->bind('App\Repositories\Common\IOnePayRepo', 'App\Repositories\Common\OnePayRepo');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $languages =array(array('item_item' => 'vi', 'short_desc' => 'Vietnamese'),
            array('item_item' => 'en', 'short_desc' => 'English'),
            array('item_item' => 'jp', 'short_desc' => 'Japanese'));
            
        View::share(['languages'=> $languages]);
    }
}
