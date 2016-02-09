<?php

namespace App\Entities;


class LinkVote extends Entity
{
    protected $table = 'votes';

    public  function users()
    {
        $this->belongsToMany(User::getClass(),'votes')->withTimestamps();

    }

    public function links()
    {
        $this->belongsToMany(Link::getClass(),'votes')->withTimestamps();
    }
}