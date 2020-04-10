<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Order extends Model
{



/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/

    public function files()
    {
        return $this->morphedByMany('App\Models\File', 'orderable');
    }

    // public function plans()
    // {
    //     return $this->morphedByMany('App\Models\Plan', 'orderable');
    // }

    // public function episodes()
    // {
    //     return $this->morphedByMany('App\Models\Episode', 'orderable');
    // }


    /*======================================================================
    |                                                                       |
    |            ************** Other Functions **************              |
    |                                                                       |
    ========================================================================*/


}
