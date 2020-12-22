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
        view()->composer('header',function($view){
         $loai_sp=type_products::all();
          $cart=Cart::content();
         $view->with('loai_sp',$loai_sp)->with('cart',$cart);
        });
    }
}
