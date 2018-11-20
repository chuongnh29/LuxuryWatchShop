<?php

namespace App\Providers;

use App\Products;
use App\ProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $loai_sp = ProductType::all();
            $loai_sp_nam = ProductType::where('type', 0)->get();
            $loai_sp_nu = ProductType::where('type', 1)->get();

            $view->with(['loai_sp' => $loai_sp, 'loai_sp_nam' => $loai_sp_nam, 'loai_sp_nu' => $loai_sp_nu]);
        });
        view()->composer('header', function ($view) {
            if (Session('cart')) {
//                $sp = Products::where()
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'tolalQty' => $cart->totalQty]);
            }
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
