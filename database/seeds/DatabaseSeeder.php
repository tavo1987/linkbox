<?php

use Styde\Seeder\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    protected $truncate = array(
        'users',
        'user_profile',
        'categories',
        'links',
        'category_link',
        'votes'
    );

    protected $seeders = array(
        'User',
        'UserProfile',
        'Category',
        'Link',
        'CategoryLink',
        'LinkVote'

    );
}
