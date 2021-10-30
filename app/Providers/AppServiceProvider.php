<?php

namespace App\Providers;
use App\Info;
use App\Post;
use App\Service;
use Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
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
//        Cookie::queue('name', 'tomek', 10);


        View::share('info', Info::all()->first());
        View::share('modalCheck', Cookie::get('name'));
        View::share('articleModal', Post::all()->where('type', '=', '1'));
        View::share('articleOnlyModal', Post::all()->where('type', '=', '2'));
        View::share('partners', Storage::disk('public')->files('/files/shares/partnerzy'));
        View::share('servicesMenu', Service::all()->where('status', '=', '1' ));
    }

}
