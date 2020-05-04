<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartable extends Model
{

    // check if specific product exists in a specific cart or not, returning true or false
    public function scopeCheckIfExists($query, $cart_id, $cartable_id, $cartable_type)
    {
        $type = 'App\Models\\'.$cartable_type;   //type of product, it could be file, episode or plan

        return $query->where('cart_id', $cart_id)
                     ->where('cartable_id', $cartable_id)
                     ->where('cartable_type', $type)
                     ->exists();
    }


    public function scopeFindItem($query, $cartId, $cartable_type, $cartable_id)
    {

      $type = 'App\Models\\'.$cartable_type;

      return $query->where('cart_id', $cartId)
                   ->where('cartable_type', $type)
                   ->where('cartable_id', $cartable_id)
                   ->first();
    }
}
