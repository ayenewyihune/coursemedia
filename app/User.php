<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'first_name', 'middle_name', 'last_name', 'email', 'phone', 'university', 'department', 'password',
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

    // Many to many relationship with roles model
    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    // Many to many relationship with course model
    public function courses() {
        return $this->hasMany('App\Course');
    }

    // One to many relationship with like model
    public function likes() {
        return $this->hasMany('App\Like');
    }

    // One to many relationship with favorite model
    public function favorites() {
        return $this->hasMany('App\Favorite');
    }

    // This will check the role of a user
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
    }
}
