<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Settings;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\view;

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
        $categories = category::take(5)->get();
        View::share('categories',$categories);

        $settings = Settings::first();
        View::Share('settings',$settings);
    }
}
