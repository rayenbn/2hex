<?php

namespace App\Providers;

use App\Models\HeatTransfer\HeatTransfer;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\View\View as IlluminateView;
use Route;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function(IlluminateView $view) {
            $view
                ->with('orders',  \App\Models\Order::auth()->get())
                ->with('grips',  \App\Models\GripTape::auth()->get())
                ->with('wheels',  \App\Models\Wheel\Wheel::auth()->get())
                ->with('transfers', HeatTransfer::auth()->get())
                ->with('isHomePage',  Route::current()->getName() === 'index');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
