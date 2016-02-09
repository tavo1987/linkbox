<?php

use Styde\Seeder\Seeder;
use Faker\Generator;
use App\Entities\Link;

class LinkTableSeeder extends Seeder
{
    protected $total = 500;

    public function getModel()
    {
        return new Link();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'title' => $faker->title,
            'favicon_path' => $faker->imageUrl(),
            'url' => $faker->url,
            'visibility' => $faker->randomElement([1,1,1,0]),
            'user_id' => $this->random('User')->id
        ];
    }

}