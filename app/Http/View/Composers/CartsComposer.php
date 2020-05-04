<?php

namespace App\Http\View\Composers;

use App\Models\Cart;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartsComposer
{
    public function compose(View $view)
    {
        if(Auth::check())
        {
            $view->with('cartCount', Cart::CartCount(Auth::id()));    //return number of items in user's cart
        }

    }



}
