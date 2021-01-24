<?php

namespace App\Providers;
use App\Info;
use App\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            if (Auth::check()){
                view()->share('user', Auth::user());
            }
        });
        View::share('info', Info::all()->first());
        View::share('servicesMenu', Service::all());
    }
}
