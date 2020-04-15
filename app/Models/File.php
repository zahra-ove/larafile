<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
// use Illuminate\Database\Query\Builder;

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

    #one to many polymorphic relationship between files table and views table
    public function views()
    {
        return $this->morphMany('App\Models\View', 'viewable');
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


    public static function seachFiles($q, $categoryId)
    {

        if($categoryId)   //if $categoryId is null it means search in all categories
        {
            return static::where('category_id', '=' ,$categoryId)
                          ->where(function ($query) use ($q){
                                $query->where('file_name', 'LIKE', "%$q%")
                                      ->orWhere('file_code', 'LIKE', "%$q%")
                                      ->orWhere('description', 'LIKE', "%$q%");
                            })
                          ->get();

        }
        else   //if $categoryId is not null it means search in specific category that user is selected in search form
        {
           return static::where('file_name', 'LIKE', "%$q%")
                        ->orWhere('file_code', 'LIKE', "%$q%")
                        ->orWhere('description', 'LIKE', "%$q%")
                        ->get();
        }
    }

}


