<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Episode;
use App\Models\File;
use App\Models\Plan;
use App\CustomClass\ShoppingCart;
use App\Models\Cart;
use App\Models\Cartable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\VarDumper\Dumper\esc;

class CartController extends Controller
{

    // showing all contents of cart
    public function index()
    {
        $cartItems = $this->cartItems();
        $cartTotalPrice = $this->cartTotalAmount();
        // return $cartItems;
        return view('cart.index')->with([
                                            'cartItems'       =>  $cartItems,
                                            'cartTotalPrice'  =>  $cartTotalPrice
                                        ]);
    }


    // add an item to the cart ($type = file, episodeor plan)
    // public function addToCart($type, $id)
    public function addToCart(Request $request)
    {
        $id   =  $request->id;
        $type =  $request->type;
        $message = '';

        switch($type)
        {
            case 'file':
                $product =  File::find($id);
                break;
            case 'episode':
                $product =  Episode::find($id);
                break;
            case 'plan':
                $product =  Plan::find($id);
                break;
        }


        if(!$product)
        {
            abort(404);
        }

        if(Auth::check())
        {
            $userId = Auth::id();  //extracting user ID
            $userCartExistance = Cart::HasCart($userId);   //check if this user has any cart or not, this syntax returns true or false

            if($userCartExistance) // if logged in user has any cart then return cart object of this user
            {

                $userCart = Cart::userCart($userId);  // returning cart object
                $cartId = $userCart->id;   //returning cart's ID

                $productExistance = Cartable::CheckIfExists($cartId, $id, $type);  //check if this product already exists in the cartables table or not

                if($productExistance)   //if this product exists in the cart
                {
                    $message = 'محصول موردنظر در سبد خرید شما موجود است.';
                }
                else
                {
                    switch($type)
                    {
                        case 'file':
                            $userCart->files()->attach($id);
                            break;
                        case 'episode':
                            $userCart->episodes()->attach($id);
                            break;
                        case 'plan':
                            $userCart->plans()->attach($id);
                            break;
                    }

                    $message = 'محصول موردنظر به سبد خرید اضافه شد.';

                }

            }
            else   //if logged in user has no cart then create one for her!
            {
                $userCart = new Cart();
                $userCart->user_id = $userId;
                $userCart->save();

                switch($type)
                {
                    case 'file':
                        $userCart->files()->attach($id);
                        break;
                    case 'episode':
                        $userCart->episodes()->attach($id);
                        break;
                    case 'plan':
                        $userCart->plans()->attach($id);
                        break;
                }

                $message = 'محصول موردنظر به سبد خرید اضافه شد.';

            }
        }
        else // if user is not logged in then store cart information in session
        {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new ShoppingCart($oldCart);
            $message = $cart->add($product, $type, $id);
            Session::put('cart', $cart);
        }
        // route('showProduct', $id)
        // return redirect()->back()->with('message', $message);

        return response()->json(['message' => $message]);
    }


//retrieve all items of cart
    public function cartItems()
    {
        if(Auth::check())  //if user is logged in
        {
            $userCartExistence = Cart::hasCart(Auth::id());   //check  if logged in user has any cart
            if($userCartExistence)  //if athenticated user has any cart then retrieve items from cart
            {
                $cartItems = Cart::CartItems(Auth::id());
            }
            else
            {
                $cartItems = null;
            }
        }
        else  //if user is not logged in
        {
            $Cart = Session::has('cart') ? Session::get('cart') : null;   //check if there is any cart in the session
            if($Cart)
            {
                $cartItems = $Cart->items;    //if there is cart then retrieve items from cart
            }
            else
            {
                $cartItems = null;
            }
        }

        return $cartItems;
        // return response()->json(['cartItems' => $cartItems]);
    }


    //calculating total amount of cart
    public function cartTotalAmount()
    {
        $cartPrice = 0;

        if(Auth::check())  //if user is logged in
        {
            $userCartExistence = Cart::hasCart(Auth::id());  // check if user has any cart or not
            if($userCartExistence)   //if user has any cart then calculate total amount of items
            {
                $cartPrice = Cart::CartTotalPrice(Auth::id());
            }
        }
        else  //if user is not logged in
        {
            $Cart = Session::has('cart') ? Session::get('cart') : null;   //check if there is any cart in the session
            if($Cart)   //if there is a cart in the session then calculate total price of cart
            {
                $cartPrice = $Cart->totalPrice;
            }
        }

        return $cartPrice;
    }



    //remove an item from cart
    public function removeItem($type, $id)
    {
        if(Auth::check())
        {
            $userId = Auth::id();   // user id
            $userCart = Cart::userCart($userId);  //finding cart object of this user
            $cartId = $userCart->id;   // finding user's cart ID

            $item = Cartable::FindItem($cartId, $type, $id);  //finding specified item in the cart

            switch($type)
            {
                case 'file':
                    $result = $userCart->files()->detach($item->cartable_id);
                    break;
                case 'episode':
                    $result = $userCart->episodes()->detach($item->cartable_id);
                    break;
                case 'plan':
                    $result = $userCart->plans()->detach($item->cartable_id);
                    break;
            }

            if($result)
            {
                $message = 'محصول موردنظر از سبد خرید حذف شد.';
            }
            else
            {
                $message = 'محصول موردنظر در سبد خرید موجود نیست.';
            }
        }
        else //if user is not logged in then remove item from session
        {
            $userCart = Session::get('cart');


            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new ShoppingCart($oldCart);
            $message = $cart->removeItem($type, $id);
            Session::put('cart', $cart);
        }

            return redirect()->route('shoppingCart')->with('message', $message);
    }


    //delete entirely the cart
    public function destroy()
    {
     # code
    }



    /** counting number of items in user's cart.
    *   in this function if user is not logged in then cart is retrieved from session
    *   and if user is logged in then retrieve user's cart from database
    **/
    public function cartCount()
    {
        if(Auth::check())  //if user is logged in then count number of items in user's cart ofcourse if user has any pending cart.
        {
            $cartCount = Cart::CartCount(Auth::id());
        }
        else  //if user is not logged in then get cart count from session
        {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cartCount = $oldCart->totalQty;
        }

        return response()->json(['cartCount' => $cartCount]);
    }




}
