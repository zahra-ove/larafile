<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['imageable_id', 'imageable_type', 'image_name', 'image_path'];

    
    # one to one polymorphic relationship between User model and Image model
    public function imageable()
    {
        return $this->morphTo();
    }
}
