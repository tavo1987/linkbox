<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Link extends Entity
{
    protected $table = 'links';

    protected $fillable = [
        'title',
        'favicon_path',
        'url',
        'visibility',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::getClass(),'category_link')->withTimestamps();
    }

    public function voters()
    {
        return $this->belongsToMany(User::getClass(),'votes');
    }
}
