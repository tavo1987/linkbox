<?php

use Styde\Seeder\Seeder;
use App\Entities\User;
use Faker\Generator;



class UserTableSeeder extends Seeder
{

    protected $total = 300;

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name' => $faker->firstName,
            'email' => $faker->email,
            'password' => 'secret',
            'role' => $faker->randomElement(['admin','member','member']),
            'provider_id' => null,
            'active' => $faker->randomElement([1,0,1,1]),
            'confirmation_token' => null
        ];
    }
    
}
