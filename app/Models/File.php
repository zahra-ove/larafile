<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;


class File extends Model
{

    protected $guarded = ['id'];

/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    # one to many relationship between file and image
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    # many to many polymorphic relationship between file and order model
    public function orders()
    {
        return $this->morphToMany('App\Models\Order', 'orderable');
    }


    /*======================================================================
    |                                                                       |
    |            ************** Other Functions **************              |
    |                                                                       |
    ========================================================================*/
    public function getShortDescriptionAttribute()
    {
        return Str::words($this->description, 20, '...');
    }

}
