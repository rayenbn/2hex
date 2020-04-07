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
            $route = Route::current();

            /** @var \Illuminate\Database\Eloquent\Collection $transfers */
            $transfers = HeatTransfer::query()
                ->auth()
                ->leftJoin('paid_files as p', 'p.file_name', '=', 'small_preview')
                ->selectRaw('heat_transfers.*, p.color_code')
                ->get();

            if(isset($route)){
                $view
                    ->with('orders',  \App\Models\Order::auth()->get())
                    ->with('grips',  \App\Models\GripTape::auth()->get())
                    ->with('wheels',  \App\Models\Wheel\Wheel::auth()->get())
                    ->with('transfers', $transfers)
                    ->with('isHomePage',  Route::current()->getName() === 'index');
            } else {
                $view
                    ->with('orders',  \App\Models\Order::auth()->get())
                    ->with('grips',  \App\Models\GripTape::auth()->get())
                    ->with('transfers', $transfers)
                    ->with('wheels',  \App\Models\Wheel\Wheel::auth()->get());
            }
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
