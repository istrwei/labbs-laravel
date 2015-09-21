<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class AuthTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    public function testAuthRegister()
    {
        $password = str_random(10);

        $this->visit('/auth/register')
             ->type(str_random(10), 'name')
             ->type(str_random(10) . '@gmail.com', 'email')
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Register')
             ->seePageIs('/');
    }

    public function testAuthLogin()
    {
        $email = str_random(10) . '@gmail.com';
        $password = str_random(10);

        factory(User::class)->create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $this->visit('/auth/login')
             ->type($email, 'email')
             ->type($password, 'password')
             ->press('Login')
             ->seePageIs('/');
    }
}
