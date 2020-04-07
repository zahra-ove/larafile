<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'parent_id', 'description'];
/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }



/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

    public function parentName($customId)
    {
        return static::where('id', $customId)->get()->pluck('name')->first();
    }

    public function getParentIdAttribute($value)
    {
        if($value != 0)
        {
            return $this->parentName($value);
        }
        else{
            return 'بدون والد';
        }
    }

}
