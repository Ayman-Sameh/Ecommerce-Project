<?php

namespace App\Providers;

// use view;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();

        $settings = Setting::all();
        View::share('setting' , $settings);

        $page = Page::all();
        View::share('pages' , $page);

        $cat = Category::all();
        View::share('category' , $cat);
    }
}
