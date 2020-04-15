<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;


class CategoriesComposer
{
    public function compose(View $view)
    {
        // $view->with('categories', Category::all());
        $view->with('categories', Category::all()->except(1));    //fetch all records from categories table except category by id=1
        // $view->with('categories', Category::where('id', '<>', 1)->get());   //fetch all records from categories table except category by id=1
    }



}
