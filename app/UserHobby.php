<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
   

    protected $fillable = [
        'user_id', 'hobby_id'
    ];

    public function user_id()
    {
        return $this->belongsTo('App\User');
    }

    public function hobby_id()
    {
        return $this->belongsTo('App\Hobby', 'hobby_id');
    }

}
