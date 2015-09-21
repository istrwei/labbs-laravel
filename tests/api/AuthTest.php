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
        $password = $this->randomString(10);

        $response = $this->call('POST', '/auth/register', [
            'name' => $this->randomString(10),
            'email' => $this->randomString(10) . '@gmail.com',
            'password' => $password,
            'password_confirmation' => $password,
            '_token' => csrf_token()
        ]);

        $this->assertEquals(302, $response->status());
        $this->assertEquals($this->baseUrl, $response->headers->get('Location'));
    }

    public function testAuthLogin()
    {
        $email = $this->randomString(10) . '@gmail.com';
        $password = $this->randomString(10);

        User::create([
            'name' => $this->randomString(10),
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $response = $this->call('POST', '/auth/login', [
            'email' => $email,
            'password' => $password,
            '_token' => csrf_token()
        ]);

        $this->assertEquals(302, $response->status());
        $this->assertEquals($this->baseUrl, $response->headers->get('Location'));
    }
}
