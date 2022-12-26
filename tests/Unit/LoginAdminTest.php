<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginAdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_login_admin_case_01()
    // {
    //     $this->post('/login-admin', [
    //         'email' => 'alka@gmail.com',
    //         'password' => '12345678'
    //     ])->assertRedirect(route('admin.homeAdmin'));
    // }

    // public function test_login_admin_case_02()
    // {
    //     $this->post('/login-admin', [
    //         'email' => 'alkausar@gmail.com',
    //         'password' => '1234567899'
    //     ])->assertRedirect(route('admin.homeAdmin'));
    // }

    // public function test_login_admin_case_03()
    // {
    //     $this->post('/login-admin', [
    //         'email' => 'alka',
    //         'password' => '12345678'
    //     ])->assertRedirect(route('admin.homeAdmin'));
    // }

    public function test_login_admin_case_04()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678999'
        ])->assertRedirect(route('admin.homeAdmin'));
    }
}
