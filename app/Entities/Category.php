<?php

namespace App\Entities;


class Category extends Entity
{
    protected $table = 'categories';

    protected $fillable = ['name','description','user_id'];


    public function user()
    {
        return $this->belongsTo(User::getClass());
    }

    public function links()
    {
        return $this->belongsToMany(Link::getClass(),'category_link');
    }

}
