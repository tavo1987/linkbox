<?php

namespace App\Entities;


class UserProfile extends Entity
{
    protected $fillable = [
        'biography',
        'twitter',
        'path_avatar',
        'web',
        'user_id'
    ];

    protected $table = 'user_profile';


    public function user()
    {
        return $this->belongsTo(User::getClass());
    }



}
