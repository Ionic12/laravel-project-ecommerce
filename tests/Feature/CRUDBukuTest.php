<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CRUDBukuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function loginP ()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));
    }
    
     public function test_crud_create_buku_case_01()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 300, 300)->size(500);

        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku/create')->assertStatus(200);

        $this->post(route('penjual-crud-buku.store'), [
            'id_penjual' => auth()->guard('webpenjual')->user()->id,
            'id_category' => 3,
            'nama_buku' => 'Panduan PHP Unit',
            'author_buku' => 'Sam Rollin',
            'penerbit_buku' => 'PT Proggramming',
            'tahun_terbit' => '2022-12-27',
            'harga_buku' => 26000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit amet consectetur 
            adipisicing elit. Illo sit harum consectetur labore in alias 
            aspernatur facilis repellat vitae molestias?'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_create_buku_case_02()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 600, 800)->size(6000);

        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku/create')->assertStatus(200);

        $this->post(route('penjual-crud-buku.store'), [
            'id_penjual' => auth()->guard('webpenjual')->user()->id,
            'id_category' => 3,
            'nama_buku' => 'Panduan PHP Unit',
            'author_buku' => 'Sam Rollin',
            'penerbit_buku' => 'PT Proggramming',
            'tahun_terbit' => '2022-12-27',
            'harga_buku' => 26000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit amet consectetur 
            adipisicing elit. Illo sit harum consectetur labore in alias 
            aspernatur facilis repellat vitae molestias?'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_create_buku_case_03()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 300, 300)->size(500);

        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku/create')->assertStatus(200);

        $this->post(route('penjual-crud-buku.store'), [
            'id_penjual' => auth()->guard('webpenjual')->user()->id,
            'id_category' => 3,
            'nama_buku' => null,
            'author_buku' => 'Sam Rollin',
            'penerbit_buku' => 'PT Proggramming',
            'tahun_terbit' => '2022-12-27',
            'harga_buku' => 26000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit amet consectetur 
            adipisicing elit. Illo sit harum consectetur labore in alias 
            aspernatur facilis repellat vitae molestias?'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_edit_buku_case_01()
    {
        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku')->assertStatus(200);

        $this->get(route('penjual.crud.buku.edit', 9))->assertSee('Panduan');

        $this->put(route('penjual-crud-buku.update', 9), [
            'nama_buku' => 'Tutorial PHP Unit',
            'author_buku' => 'Roland Zanawa',
            'penerbit_buku' => 'PT Testing'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_edit_buku_case_02()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 1280, 720)->size(6000);

        $this->loginP();

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku')->assertStatus(200);

        $this->get(route('penjual.crud.buku.edit', 9))->assertSee('Tutorial');

        $this->put(route('penjual-crud-buku.update', 9), [
            'harga_buku' => 26000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit amet consectetur 
            adipisicing elit. Illo sit harum consectetur labore in alias 
            aspernatur facilis repellat vitae molestias?'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_edit_buku_case_03 ()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 800, 600)->size(1500);

        $this->loginP();

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku')->assertStatus(200);

        $this->get(route('penjual.crud.buku.edit', 9))->assertSee('Tutorial');

        $this->put(route('penjual-crud-buku.update', 9), [
            'id_category' => 2,
            'nama_buku' => 'Latihan Php Unit Laravel',
            'author_buku' => 'HamberZerk',
            'penerbit_buku' => 'PT Laravel',
            'tahun_terbit' => '2022-12-29',
            'harga_buku' => 33000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit, amet 
            consectetur adipisicing elit. Aliquid recusandae 
            sint harum deleniti distinctio inventore molestiae. 
            Magni, ullam exercitationem.'
        ])->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_delete_buku_case_01()
    {
        $this->loginP();
        $this->get('/home/penjual')->assertStatus(200);
        $this->get('/penjual-crud-buku')->assertStatus(200);
        $this->delete(route('penjual-crud-buku.destroy', 9))
        ->assertRedirect(route('penjual.crud.buku'));
    }

    public function test_crud_latihan_buku_case_01()
    {
        Storage::fake('photos');

        $file = UploadedFile::fake()->
        image('avatar'.rand(0, 30).'.jpg', 300, 300)->size(500);

        $this->post('/proses/login/penjual', [
            'email' => 'rando@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('penjual.indexPenjual'));

        $this->get('/home/penjual')->assertStatus(200);

        $this->get('/penjual-crud-buku/create')->assertStatus(200);

        $this->post(route('penjual-crud-buku.store'), [
            'id_penjual' => auth()->guard('webpenjual')->user()->id,
            'id_category' => 3,
            'nama_buku' => 'Inpo PPL',
            'author_buku' => 'Seth Macqies',
            'penerbit_buku' => 'PT Acak2',
            'tahun_terbit' => '2022-12-27',
            'harga_buku' => 26000,
            'gambar_buku' => $file,
            'deskripsi_buku' => 'Lorem ipsum dolor sit amet consectetur 
            adipisicing elit. Illo sit harum consectetur labore in alias 
            aspernatur facilis repellat vitae molestias?'
        ])->assertRedirect(route('penjual.crud.buku'));
    }
}
