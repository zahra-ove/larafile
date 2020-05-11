<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['name', 'email', 'user_id', 'body', 'commentable_id', 'commentable_type', 'approved'];

    #one to many polymorphic relationship between comments ans articles, files, episodes table.
    public function commentable()
    {
        return $this->morphTo();
    }

    # one to many relationship between comments and users table
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    # one to many polymorphic relationship between comments together, every parent comment could have many child comments and any child comment belongs to one parent comment
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
