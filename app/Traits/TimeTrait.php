<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


use Carbon\Carbon;

trait TimeTrait
{
    public function last3Months()
    {
        $now = Carbon::now();                  //calculate current date
        $last3Months = $now->subMonths(3);    //calculate exact date of three months ago

        return $last3Months;
    }


}
