<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        
        // $menu = '<i>Menu 234898765432</i>';
        // View::share('menu',$menu);

        View::composer(['layout','pages.index'],function($view){
            $menu = '<i>Menu 234898765432</i>';
            $view->with('menu',$menu);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
