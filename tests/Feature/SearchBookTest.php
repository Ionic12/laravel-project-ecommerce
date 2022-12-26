<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchBookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
     public function test_search_buku_case_01()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')
        ->assertStatus(200);
        $this->get('/home/user/product/allBuku?search=Latihan')
        ->assertSee('Latihan 4');
    }

    public function test_search_buku_case_02()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')
        ->assertStatus(200);
        $this->get('/home/user/product/allBuku/cate/3')
        ->assertSee('Percobaan 3')
        ->assertDontSeeText('Percobaan 4');
    }

    public function test_search_buku_case_03()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')
        ->assertStatus(200);
        $this->get('/home/user/product/allBuku?search=Zalora')
        ->assertSeeText('Oops! Buku Tidak Ada')->
        assertDontSeeText('Percobaan');
    }
}
