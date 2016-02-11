<?php

use App\Entities\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function test_user_login()
    {

        //HAVING
        $user = seed('User',[
            'email'              => 'admin@gmail.com',
            'password'           => 'secret',
            'role'               => 'admin',
            'active'             => 1,
            'confirmation_token' => null

            ]);

        //WHEN
        $this->visit('/')
            ->see('Inicia Sesión por favor')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Entrar');

        //THEN
            $this->see('Usuarios')
                ->seePageis('/admin/users');


    }
}
