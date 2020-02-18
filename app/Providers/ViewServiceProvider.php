<?php

namespace App\Providers;

use App\Models\HeatTransfer\HeatTransfer;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\View\View as IlluminateVue;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function(IlluminateVue $view) {
            $view
                ->with('orders',  \App\Models\Order::auth()->get())
                ->with('grips',  \App\Models\GripTape::auth()->get())
                ->with('wheels',  \App\Models\Wheel\Wheel::auth()->get())
                ->with('transfers', HeatTransfer::auth()->get());
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
