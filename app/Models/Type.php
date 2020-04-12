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

    public function getNameAttribute($value)
    {
        switch($value)
        {
            case 'video':
                return "ویدیو";
            case 'sound':
                return "صوتی";
            case 'PDF':
                return "PDF";
            case "PPT":
                return "پاورپوینت";
        }
    }
}
