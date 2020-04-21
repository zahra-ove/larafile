<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $guarded = ['id'];

/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    # one to many relationship between users and rates tables
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    # one to many polymorphic relation between rates table and "files", "episodes", "articles" tables
    public function rateble()
    {
        return $this->morphTo();
    }


/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

//calculating average star for specified file,episode,article based on $id. $id specifies 'rateble_id' and $type specifies 'rateble_type' taht could be file,episode or article
    public function scopeAverageRate($query, $type, $id)
    {
        // return $query->where('rateble_type', $type)
        //              ->where('rateble_id', $id)
        //              ->avg('star');

        return $query->where('rateble_type', $type)
                     ->where('rateble_id', $id)
                     ->selectRaw('CAST(AVG(star) AS DECIMAL(2,1)) AS star_avg')->first()->star_avg;
                     //  ->selectRaw('AVG(CAST(star AS FLOAT)) AS star_avg')->first()->star_avg;
                    
    }

//number of rates for specified item
    public static function scopeCountRate($query, $type, $id)
    {
        return  $query->where('rateble_type', $type)
                      ->where('rateble_id', $id)
                      ->count();
    }

}
