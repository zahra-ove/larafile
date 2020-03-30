<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'gender_id', 'age', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


/*======================================================================
|                                                                       |
|       ************** Relationships Functions **************           |
|                                                                       |
========================================================================*/
    # many to many relationship between users and roles table
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    # one to many relationship between users and genders table
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    # one to many relationship between addresses table and users table
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    # one to one polymorphic relationship between User model and Image model
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

/*======================================================================
|                                                                       |
|            ************** Other Functions **************              |
|                                                                       |
========================================================================*/

    #isAdmin method checks if authenticated user is Admin or not
    public function isAdmin()
    {
        $roles = $this->roles()->get();

        foreach($roles as $role)
        {
            if($role->name == 'Admin')
            {
                return true;
            }
        }

        return false;
    }


    #check if user has this specific role or not
    public function hasRole($role)
    {
        $roles = $this->roles()->get()->pluck('name');

        if($roles->contains($role))
        {
            return TRUE;
        }

        return FALSE;

    }




}
