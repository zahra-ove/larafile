<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
