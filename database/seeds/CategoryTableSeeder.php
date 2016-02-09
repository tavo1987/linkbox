<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use App\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    protected $total = 300;

    public function getModel()
    {
        return new Category();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'name' => $faker->colorName,
            'description' => $faker->sentence(5),
            'user_id' => $this->random('User')->id
        ];
    }

}