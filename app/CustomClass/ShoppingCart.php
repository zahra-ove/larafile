<?php

namespace App\CustomClass;

class ShoppingCart
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldcart)
    {
        if($oldcart)
        {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }



    public function add($item, $type, $id)
    {
        $message = '';
        $storedItem = ['type' => $type, 'price' => $item->price, 'item' => $item];
        if($this->items)
        {
            if(array_key_exists(($type.$id), $this->items))
            {
                // $storedItem = $this->items[$id];
                return $message = 'شما این دوره را قبلا خریداری کرده اید.';
            }
        }

        $this->items[$type.$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

        return $mesage = 'محصول موردنظر به سبد خرید اضافه شد.';
    }


    public function removeItem($type, $id)
    {
        $message = '';
        if(array_key_exists( ($type.$id), $this->items) )
        {
            $this->totalPrice -= $this->items[$type.$id]['price'];
            unset($this->items[$type.$id]);
            $this->totalQty--;
            return $mesage = 'محصول موردنظر از سبد خرید حذف شد.';
        }

        return $mesage = 'محصول موردنظر در سبد خرید وجود ندارد.';
    }


}
