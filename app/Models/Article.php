<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;



class Article extends Model
{

    protected $fillable = ['title', 'body', 'slug', 'user_id', 'category_id', 'view_count'];
/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/

    # one to many polymorphic relationship between article and image
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    # one to many relationship between article and category
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    # one to many polymorphic relationship between articles table and views table
    public function views()
    {
        return $this->morphMany('App\Models\View', 'viewable');
    }

    # one to many polymorphic relationship between comments and articles table
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    # one to many polymorphic relationship between articles and rates tables
    public function rates()
    {
        return $this->morphMany('App\Models\Rate', 'rateble');
    }

    # one to many  relationship between articles and users tables
    public function user()
    {
        return $this->belongsTo('App\User');
    }
/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/
    public function getBriefBodyAttribute()
    {
        return Str::words($this->body, 20, '...');
    }




}
