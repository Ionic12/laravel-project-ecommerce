<?php

namespace Tests\Feature;

use App\Models\Transaksi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class VerifikasiPesananTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_verifikasi_pesanan_menerima()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));
        $this->get('/home/penjual')->assertStatus(200);
        $this->get('/home/penjual/list/transaksi')
        ->assertSee('Raihan');
        $postPesanan = $this->post(route('penjual.list.t.store', [
            'penjual_id' => 1,
            'transaksi_id' => 1,
            'first_name_keranjang' => 'Latihan 4',
            'status_pesanan' => 'Diterima'
        ]));
        if ($postPesanan) {
            $data = DB::table('transaksis')->where('id', 1)
            ->update(['level' => 2]);
            $postPesanan->assertRedirect(route('penjual.pesanan'));
        }
    }

    public function test_verifikasi_pesanan_menolak()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));
        $this->get('/home/penjual')->assertStatus(200);
        $this->get('/home/penjual/list/transaksi')
        ->assertSee('Raihan');
        $postPesanan = $this->post(
            route('penjual.list.t.store', [
            'penjual_id' => 1,
            'transaksi_id' => 2,
            'first_name_keranjang' => 'Latihan 2',
            'status_pesanan' => 'Ditolak'
        ]));
        if ($postPesanan) {
            $data = DB::table('transaksis')->where('id', 2)
            ->update(['level' => 2]);
            $postPesanan->assertRedirect(
                route('penjual.pesanan'));
        }
    }
}
