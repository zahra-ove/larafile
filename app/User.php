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



    # many to many relationship between users and roles table
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

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
}
