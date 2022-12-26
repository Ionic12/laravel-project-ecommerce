<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterPembeliTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_pembeli_case_01()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->get('/register-user')->assertStatus(200);
        $this->post(route('user.registerUser'), [
            'first_name' => 'Obi Wan',
            'last_name' => 'Kenobi',
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('login-user'));
    }

    public function test_register_pembeli_case_02()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->get('/register-user')->assertStatus(200);
        $this->post(route('user.registerUser'), [
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'password' => null
        ])->assertRedirect(route('login-user'));
    }

    public function test_register_pembeli_case_03()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->get('/register-user')->assertStatus(200);
        $this->post(route('user.registerUser'), [
            'first_name' => 'Anakin',
            'last_name' => 'Skywalker',
            'email' => 'anakin',
            'password' => '12345678'
        ])->assertRedirect(route('login-user'));
    }

    public function test_register_pembeli_case_04()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->get('/register-user')->assertStatus(200);
        $this->post(route('user.registerUser'), [
            'first_name' => 'Obi Wan',
            'last_name' => 'Kenobi',
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('login-user'));
    }
}
