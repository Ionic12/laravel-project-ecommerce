<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CRUDCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crud_create_category_01()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.create'))->assertStatus(200);
        $this->post(route('admin-category.store'), [
            'nama_category' => 'Gaya Hidup'
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_create_category_02()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.create'))->assertStatus(200);
        $this->post(route('admin-category.store'), [
            'nama_category' => null
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_create_category_03()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.create'))->assertStatus(200);
        $this->post(route('admin-category.store'), [
            'nama_category' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit. Donec in faucibus erat. Suspendisse hendrerit 
            neque id felis faucibus gravida. Nullam non justo convallis 
            mauris blandit finibus'
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_edit_category_01()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.edit', 7))->assertStatus(200);
        $this->put(route('admin-category.update', 7), [
            'nama_category' => 'Life Style'
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_edit_category_02()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.edit', 7))->assertStatus(200);
        $this->put(route('admin-category.update', 7), [
            'nama_category' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit. Donec in faucibus erat. Suspendisse hendrerit 
            neque id felis faucibus gravida. Nullam non justo convallis 
            mauris blandit finibus'
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_edit_category_03()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->get(route('admin.category.edit', 7))->assertStatus(200);
        $this->put(route('admin-category.update', 7), [
            'nama_category' => null
        ])->assertRedirect(route('admin.category'));
    }

    public function test_crud_delete_category_01()
    {
        $this->post('/login-admin', [
            'email' => 'alka@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('admin.homeAdmin'));

        $this->get('/admin-category')->assertStatus(200);
        $this->delete(route('admin-category.destroy', 7))->
        assertRedirect(route('admin.category'));
    }
}
