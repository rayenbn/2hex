<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\View\Composers\ConfiguratorShowing;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $view
                ->with('orders',  \App\Models\Order::auth()->get())
                ->with('grips',  \App\Models\GripTape::auth()->get())
                ->with('wheels',  \App\Models\Wheel\Wheel::auth()->get());
        });
        
        // View::composer(
        //     'wheel-configurator.configurator', ConfiguratorShowing::class
        // );
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
