<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Entities\UserProfile;

class UserProfileTableSeeder extends Seeder
{
    protected $total = 260;

    public function getModel()
    {
        return new UserProfile();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'biography' => $faker->paragraph(4),
            'twitter' => '@'.$faker->userName,
            'path_avatar' => $faker->imageUrl(250,300,'people'),
            'web' => $faker->domainName,
            'user_id' =>  $faker->unique()->numberBetween(1,300)

        ];
    }

}