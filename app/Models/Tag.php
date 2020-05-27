<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name', 'description'];
/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/

# many to many polymorphic relationship
public function files()
{
    return $this->morphedByMany('App\Models\File', 'taggable');
}


# many to many polymorphic relationship
public function articles()
{
    return $this->morphedByMany('App\Models\Article', 'taggable');
}
/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

/**
 * Get the route key for the model.
 * I want retrieving the tag model be based on tag name, not tag ID. also tag name is set to unique.
 * @return string
 */
public function getRouteKeyName()
{
    return 'name';
}

}
