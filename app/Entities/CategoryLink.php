<?php

namespace App\Entities;


class CategoryLink extends Entity
{

    protected $table = 'category_link';

    public function categories()
    {
        $this->belongsToMany(Category::getClass(),'category_link')->withTimestamps();
    }

    public function links()
    {
        $this->belongsToMany(Link::getClass(),'category_link')->withTimestamps();
    }

}