<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = ['user_id'];

/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    # many to many polymorphic relation between carts and files table
    public function files()
    {
        return $this->morphedByMany('App\Models\File', 'cartable');
    }

    # many to many polymorphic relation between carts and episodes table
    public function episodes()
    {
        return $this->morphedByMany('App\Models\Episode', 'cartable');
    }

    # many to many polymorphic relation between carts and plans table
    public function plans()
    {
        return $this->morphedByMany('App\Models\Plan', 'cartable');
    }

    # one to many relation between users and carts table
    public function user()
    {
        return $this->belongsTo('App\User');
    }


/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/



//check if user has any cart or not
public function scopeHasCart($query, $userId)
{
    return $query->where('user_id', $userId)->exists();
}




//return cart of user based in user_id
//before using this function, first check if user has any cart
public function scopeUserCart($query, $userId)
{
    return $query->where('user_id', $userId)->first();
}




public  function scopeCartCount($query, $userId)
{

    $totalCount = 0;
    $totalFiles = 0;
    $totalPlans = 0;
    $totalEpisodes = 0;

    $userCartExistance = $query->HasCart($userId);  // if there is a cart associated related to this user in the carts table then it returns true, otherwise it returns false

    if($userCartExistance)  //if user has pending cart then calculate number of elements in the cart
    {
        // $userCart = $query->where('user_id', $userId)->first();  //returning cart object
        $userCart = $query->UserCart($userId);  //returning cart object

        foreach($userCart->files as $item)
        {
            $totalFiles++;
        }

        foreach($userCart->episodes as $item)
        {
            $totalEpisodes++;
        }

        foreach($userCart->plans as $item)
        {
            $totalPlans++;
        }

        $totalCount = $totalFiles + $totalEpisodes + $totalPlans;
        return $totalCount;

    }
    else{  // if user has no cart then return 0 as number of items in the cart
        return $totalCount;
    }
}



//retrieving all user's cart Item
public function scopeCartItems($query, $userId)
{
    $cartItems = array();   //an array for storing cart items

    $userCartExistence = $query->HasCart($userId);  // check if this user has any cart, returns true or false


   if($userCartExistence)
   {
        $userCart = $query->UserCart($userId);  //user's cart object

        foreach($userCart->files as $item)
        {
            $item->productType = 'file';
            $cartItems[] = $item;
        }

        foreach($userCart->episodes as $item)
        {
            $item->productType = 'episode';
            $cartItems[] = $item;
        }

        foreach($userCart->plans as $item)
        {
            $item->productType = 'plan';
            $cartItems[] = $item;
        }
   }


   return $cartItems;
}

public function scopeCartTotalPrice($query, $userId)
{
    $filePrice = 0;
    $episodePrice = 0;
    $planPrice = 0;
    $totalPrice = 0;

    $userCartExistence = $query->HasCart($userId);  // check if this user has any cart, returns true or false

    if($userCartExistence)
    {
        $userCart = $query->UserCart($userId);

         foreach($userCart->files as $item)
         {
             $filePrice += $item->price;
         }

         foreach($userCart->episodes as $item)
         {

            $episodePrice += $item->price;
         }

         foreach($userCart->plans as $item)
         {
            $planPrice += $item->price;
         }

         $totalPrice = $filePrice + $episodePrice + $planPrice;
    }


    return $totalPrice;

}


}
