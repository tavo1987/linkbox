<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Entities\LinkVote;

class LinkVoteTableSeeder extends Seeder
{
    protected $total = 150;

    public function getModel()
    {
        return new LinkVote();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'user_id' => $this->random('User')->id,
            'link_id' => $this->random('Link')->id
        ];
    }

}