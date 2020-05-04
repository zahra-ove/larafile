<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{


    # many to many polymorphic relationship between plans and carts table
    public function carts()
    {
        return $this->morphToMany('App\Models\Cart', 'cartable');
    }
}
