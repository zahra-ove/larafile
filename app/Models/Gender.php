<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{


    protected $genderName = [
                                'woman' =>  'خانم',
                                'man' =>  'آقا',
                                'none' =>  '-',
                            ];
    /*======================================================================
    |                                                                       |
    |       ************** Relationships Functions **************           |
    |                                                                       |
    ========================================================================*/
    public function users()
    {
        return $this->hasMany('App\User');
    }




    /*======================================================================
    |                                                                       |
    |            ************** Other Functions **************              |
    |                                                                       |
    ========================================================================*/

// this accessor gets name of gender and then based on $genderName array, we convert the name to persia version.
    public function getNameAttribute($value)
    {
        return $this->genderName[$value];
    }

}
