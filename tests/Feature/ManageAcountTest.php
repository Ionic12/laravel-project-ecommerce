<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAcountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_manage_acount_pembeli_case_01()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/verifikasi-user')->assertStatus(200);

        $this->put(route('verifikasi-user.update', 3), [
            'level' => 3
        ])->assertRedirect(route('admin.verifikasi'));
    }

    public function test_manage_acount_pembeli_case_02()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/verifikasi-user')->assertStatus(200);

        $this->put(route('verifikasi-user.update', 3), [
            'level' => 2
        ])->assertRedirect(route('admin.verifikasi'));
    }

    public function test_manage_acount_penjual_case_01()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/verifikasi-penjual')->assertStatus(200);

        $this->put(route('verifikasi-penjual.update', 11), [
            'level' => 3
        ])->assertRedirect(route('admin.verifikasi.penjual'));
    }

    public function test_manage_acount_penjual_case_02()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/verifikasi-penjual')->assertStatus(200);

        $this->put(route('verifikasi-penjual.update', 11), [
            'level' => 2
        ])->assertRedirect(route('admin.verifikasi.penjual'));
    }

    public function test_manage_acount_penjual_case_03()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/verifikasi-penjual')->assertStatus(200);

        $this->get(route('admin.verifikasi.penjual.show', 11))->assertSee('Lorem');
    }
}
