<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        View::composer('layout.header', 'App\Http\View\Composers\CategoriesComposer');
        View::composer('cart.cart-count', 'App\Http\View\Composers\CartsComposer');
        View::composer('admin.layout.sidebar', 'App\Http\View\Composers\UnapprovedCommentsComposer');
    }
}
