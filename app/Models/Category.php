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

    # one to many relationship between categories table and files table
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    # one to many relationship between categories table and articles table
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
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
