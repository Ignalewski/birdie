<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    protected $fillable = [
        'user_id', 'content'
    ];

    public function user()
    {
        return $this->hasMany('user');
    }
}
