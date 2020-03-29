<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    # one to many relationship between addresses table and users table
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
