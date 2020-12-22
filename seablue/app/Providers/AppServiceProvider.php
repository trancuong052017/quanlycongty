<?php

namespace App\Providers;
use App\type_products;
use Illuminate\Support\ServiceProvider;
use Cart;
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
        view()->composer('menu_1',function($view){
         $loaitin=type_products::all();
         //dd($loaitin); 
         $view->with('loaitin',$loaitin);
         });      
    }
}
