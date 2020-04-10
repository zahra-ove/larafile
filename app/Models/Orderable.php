<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TimeTrait;
use Carbon\Carbon;


class Orderable extends Model
{


    use TimeTrait;
/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/




/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

#this function returns newest orders in last 3 months
public function scopeNewOrders($query)
{
    return $query->where('created_at' , '>' , $this->last3Months());
}


#finding top 10 sellers in products of files in last three months
// $type is orderable_type. it could be  "File" or "Plan" or "Episode"
public static function topTenSeller($type)
{

    $orderableFile = Orderable::NewOrders()->where('orderable_type' , 'App\Models\\'.$type)->get();
    $neworderableFile = $orderableFile->groupBy('orderable_id');



    $key = array();
    $value = array();

    foreach ($neworderableFile as $orderable_id => $order) {
        $key[] =  $orderable_id;
        $value[] = $order->count(); // each orderable_id has how many repetition in orderable table
     }

     $newOrders = array_combine($key, $value);

     arsort($newOrders, 1);    //descending sort, then fisrt 10 elements are top sellers


     $topTen = array_slice($newOrders, 0, 10, true);    //selects first ten elements ---> in this array we have orcerable_id as key and number of repetition of this key as value
     $topsoldId = array_keys($topTen);   //extract just key from $topTen array, these keies are acutally file Id

     return $topsoldId;
}


}
