<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['imageable_id', 'imageable_type', 'image_name', 'image_path', 'type'];


    # one to one polymorphic relationship between User model and Image model
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getImageTypeAttribute()
    {
        $type = $this->type;   //get type of image
        if($type == 'o')
        {
            return 'معمولی';
        }
        elseif($type == 'b')
        {
            return 'بنر';
        }
    }
}
