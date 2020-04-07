<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
