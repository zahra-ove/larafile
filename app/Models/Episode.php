<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    #one to many polymorphic relationship between episodes table and views table
    public function views()
    {
        return $this->morphMany('App\Models\View', 'viewable');
    }


    # one to many polymorphic relationship
    public function rates()
    {
        return $this->morphMany('App\Models\Rate', 'rateble');
    }

/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/




}
