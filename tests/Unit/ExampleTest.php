<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_case_1()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_login_case_2()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando22@gmail.com',
            'password' => '1234'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_login_case_3()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_login_case_4()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '1234'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }
}
