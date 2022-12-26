<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_profile_case_01()
    {   
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual/edit/penjual/'.
        auth()->guard('webpenjual')->user()->id)
        ->assertStatus(200);

        $this->put(route('penjual.proses.eProfile', 
        auth()->guard('webpenjual')->user()->id), [
            'first_name' => 'Rando Brando',
            'last_name' => 'Trako Razor',
            'nama_toko' => 'Toko Rando Zor'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_update_profile_case_02()
    {   
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual/edit/penjual/'.
        auth()->guard('webpenjual')->user()->id)
        ->assertStatus(200);

        $this->put(route('penjual.proses.eProfile', 
        auth()->guard('webpenjual')->user()->id), [
            'first_name' => null,
            'last_name' => 'Trako Razor',
            'nama_toko' => 'Toko Rando Zor',
            'email' => 'rando@gmail.com'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_update_profile_case_03()
    {   
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual/edit/penjual/'.
        auth()->guard('webpenjual')->user()->id)
        ->assertStatus(200);

        $this->put(route('penjual.proses.eProfile', 
        auth()->guard('webpenjual')->user()->id), [
            'first_name' => 'Rando Brando',
            'last_name' => null,
            'nama_toko' => 'Toko Rando Zor',
            'email' => 'rando@gmail.com'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_update_profile_case_04()
    {   
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual/edit/penjual/'.
        auth()->guard('webpenjual')->user()->id)
        ->assertStatus(200);

        $this->put(route('penjual.proses.eProfile', 
        auth()->guard('webpenjual')->user()->id), [
            'nama_toko' => null
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_update_profile_case_05()
    {   
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual/edit/penjual/'.
        auth()->guard('webpenjual')->user()->id)
        ->assertStatus(200);

        $this->put(route('penjual.proses.eProfile', 
        auth()->guard('webpenjual')->user()->id), [
            'email' => 'rando'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    
}
