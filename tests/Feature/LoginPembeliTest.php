<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPembeliTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_pembeli_case_01()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
    }

    public function test_login_pembeli_case_02()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi222@gmail.com',
            'password' => '1234fdsf5678'
        ])->assertRedirect(route('user.Home'));
    }

    public function test_login_pembeli_case_3()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obiban@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
    }

    public function test_login_pembeli_case_04()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user')->assertSee('Selamat Datang');
        $this->get(route('logout-user'))->assertRedirect(route('login-user'));
    }
}
