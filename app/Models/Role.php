<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{



    # many to many relationship between users and roles table
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
