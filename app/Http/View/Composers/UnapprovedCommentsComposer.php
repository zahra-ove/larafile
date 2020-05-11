<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Comment;


class UnapprovedCommentsComposer
{
    public function compose(View $view)
    {

        $view->with('unApprovedComments', Comment::where('approved', 0)->count());    //fetch all records from categories table except category by id=1
        // $view->with('categories', Category::where('id', '<>', 1)->get());   //fetch all records from categories table except category by id=1
    }



}
