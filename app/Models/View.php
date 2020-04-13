<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use App\Traits\TimeTrait;


class View extends Model
{

    use TimeTrait;
    protected $fillable = ['viewable_id', 'viewable_type', 'user_id'];
/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/

    public function viewable()
    {
        return $this->morphTo();
    }


/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

    #this function returns newest orders in last 3 months
    public function scopeNewViews($query)
    {
        return $query->where('created_at' , '>' , $this->last3Months());
    }


    #popular files in last 3 months
    public function scopeMostViewedFiles($query)
    {
        $popularFiles = $query->NewViews()
                            ->where('viewable_type', 'App\Models\File')
                            ->select('viewable_id', DB::raw("count(viewable_id) as count"))
                            ->groupby('viewable_id')
                            ->orderby('count', 'desc')
                            ->take(10)
                            ->get();

        return $popularFiles;
    }

}
