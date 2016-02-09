<?php

use App\Entities\CategoryLink;
use Faker\Generator;
use Styde\Seeder\Seeder;


class CategoryLinkTableSeeder extends Seeder
{
    protected $total = 250;

    public function getModel()
    {
        return new CategoryLink();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'category_id' => $this->random('Category')->id,
            'link_id'     => $this->random('Link')->id
        ];
    }

}