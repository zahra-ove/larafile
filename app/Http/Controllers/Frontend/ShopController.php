<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // $products = File::all();
        $categories = Category::all();
        $products = File::paginate(6);




        //calculate average rate of each file
        $rates = Rate::TotalAverageRate('App\Models\File');

        return view('shop')->with([
                                    'categories' => $categories,
                                    'products'   => $products,
                                    'rates'      => $rates
                                  ]);

    }

}
