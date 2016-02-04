<?php

use Illuminate\Database\Seeder;
use App\Entities\Link;
use App\Entities\Category;
use App\Entities\UserProfile;
use App\Entities\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        UserProfile::truncate();
        Link::truncate();
        Category::truncate();
        DB::table('votes')->truncate();
        DB::table('category_link')->truncate();


        //admin
        $user = User::create([
            'name' => 'Edwin Ramírez',
            'email'=> 'tavo198718@gmail.com',
            'password'=> 'secret',
            'active'=> 1,
            'role' => 'admin',
            'remember_token' => str_random(10),
        ]);



        factory(User::getClass(),100)->create();
        factory(UserProfile::getClass(),100)->create();
        factory(Category::getClass(),100)->create();

        factory(Link::getClass(),200)->create()->each(function($link){
            $link->voters()->attach(array_rand(range(1,100),5));
            $link->categories()->attach(array_rand(range(1,100),5));
        });


    }
}
