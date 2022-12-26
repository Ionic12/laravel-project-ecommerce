<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class VerifikasiPenjualTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_verifikasi_penjual_case_01()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->image('avatar'.rand(0, 30).'.jpg', 200, 200)->size(200);

        $this->post('/proses/login/penjual', [
            'email' => 'latihan@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get(route('penjual.verifikasiPenjual'))->assertStatus(200);
        $this->post(route('penjual.verifikasiPenjual.store'), [
            'penjual_id' => auth()->guard('webpenjual')->user()->id,
            'lokasi_toko' => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
            'foto_toko' => $file,
            'foto_ktp' => $file,
            'sertefikat_toko' => $file,
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_verifikasi_penjual_case_02()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->image('avatar'.rand(0, 30).'.jpg', 200, 200)->size(200);

        $this->post('/proses/login/penjual', [
            'email' => 'latihan@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get(route('penjual.verifikasiPenjual'))->assertStatus(200);
        $this->post(route('penjual.verifikasiPenjual.store'), [
            'penjual_id' => auth()->guard('webpenjual')->user()->id,
            'lokasi_toko' => null,
            'foto_toko' => $file,
            'foto_ktp' => $file,
            'sertefikat_toko' => $file,
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_verifikasi_penjual_case_03()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->image('avatar'.rand(0, 30).'.jpg', 200, 200)->size(200);

        $this->post('/proses/login/penjual', [
            'email' => 'latihan@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get(route('penjual.verifikasiPenjual'))->assertStatus(200);
        $this->post(route('penjual.verifikasiPenjual.store'), [
            'penjual_id' => auth()->guard('webpenjual')->user()->id,
            'lokasi_toko' => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
            'foto_toko' => null,
            'foto_ktp' => $file,
            'sertefikat_toko' => $file,
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_verifikasi_penjual_case_04()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->image('avatar'.rand(0, 30).'.jpg', 200, 200)->size(200);

        $this->post('/proses/login/penjual', [
            'email' => 'latihan@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get(route('penjual.verifikasiPenjual'))->assertStatus(200);
        $this->post(route('penjual.verifikasiPenjual.store'), [
            'penjual_id' => auth()->guard('webpenjual')->user()->id,
            'lokasi_toko' => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
            'foto_toko' => $file,
            'foto_ktp' => null,
            'sertefikat_toko' => $file,
        ])->assertRedirect(route('penjual.indexPenjual'));
    }

    public function test_verifikasi_penjual_case_05()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->image('avatar'.rand(0, 30).'.jpg', 200, 200)->size(6000);

        $this->post('/proses/login/penjual', [
            'email' => 'latihan@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get(route('penjual.verifikasiPenjual'))->assertStatus(200);
        $this->post(route('penjual.verifikasiPenjual.store'), [
            'penjual_id' => auth()->guard('webpenjual')->user()->id,
            'lokasi_toko' => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
            'foto_toko' => $file,
            'foto_ktp' => $file,
            'sertefikat_toko' => $file,
        ])->assertRedirect(route('penjual.indexPenjual'));
    }
}
