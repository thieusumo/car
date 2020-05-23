<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Route;
use View;
use Auth;


class ComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*',function($view){
            $route = Route::active()->get();
            $view->with('route_composer',$route);
        });

        View::composer('*', function($view){
            $data['customer_composer'] = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : null;
            $view->with($data);
        });
    }
}
