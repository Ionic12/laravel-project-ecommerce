<?php

namespace Tests\Feature;

use App\Models\Buku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeranjangTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_keranjang_case_01()
    {
        $getDataB = Buku::where('id', '=', 6)->first();
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')->
        assertSeeText('Filter Buku');
        $this->get('/home/user/product/buku/6')->
        assertSeeText('Latihan 2')->assertDontSeeText('Latihan 3');
        $this->post(route('store.keranjang'), [
            'buku_id' => $getDataB->id,
            'user_id' => auth()->user()->id,
            'penjual_id' => $getDataB->id_penjual,
            'quantity' => 5
        ])->assertRedirect(route('user.keranjangUser'));
    }

    public function test_keranjang_case_02()
    {
        $getDataB = Buku::where('id', '=', 6)->first();
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')->
        assertSeeText('Filter Buku');
        $this->get('/home/user/product/buku/6')->
        assertSeeText('Latihan 2')->assertDontSeeText('Latihan 3');
        $this->post(route('store.keranjang'), [
            'buku_id' => null,
            'user_id' => auth()->user()->id,
            'penjual_id' => $getDataB->id_penjual,
            'quantity' => 5
        ])->assertRedirect(route('user.keranjangUser'));
    }

    public function test_keranjang_case_03()
    {
        $getDataB = Buku::where('id', '=', 6)->first();
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')->
        assertSeeText('Filter Buku');
        $this->get('/home/user/product/buku/6')->
        assertSeeText('Latihan 2')->assertDontSeeText('Latihan 3');
        $this->post(route('store.keranjang'), [
            'buku_id' => $getDataB->id,
            'user_id' => null,
            'penjual_id' => $getDataB->id_penjual,
            'quantity' => 5
        ])->assertRedirect(route('user.keranjangUser'));
    }

    public function test_keranjang_case_04()
    {
        $getDataB = Buku::where('id', '=', 6)->first();
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')->
        assertSeeText('Filter Buku');
        $this->get('/home/user/product/buku/6')->
        assertSeeText('Latihan 2')->assertDontSeeText('Latihan 3');
        $this->post(route('store.keranjang'), [
            'buku_id' => $getDataB->id,
            'user_id' => auth()->user()->id,
            'penjual_id' => null,
            'quantity' => 5
        ])->assertRedirect(route('user.keranjangUser'));
    }

    public function test_keranjang_case_05()
    {
        $getDataB = Buku::where('id', '=', 6)->first();
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));
        $this->get('/home/user/product/allBuku')->
        assertSeeText('Filter Buku');
        $this->get('/home/user/product/buku/6')->
        assertSeeText('Latihan 2')->assertDontSeeText('Latihan 3');
        $this->post(route('store.keranjang'), [
            'buku_id' => $getDataB->id,
            'user_id' => auth()->user()->id,
            'penjual_id' => $getDataB->id_penjual,
            'quantity' => null
        ])->assertRedirect(route('user.keranjangUser'));
    }
}
