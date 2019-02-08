<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug','middle_name','last_name','city','status','country','dob','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}
