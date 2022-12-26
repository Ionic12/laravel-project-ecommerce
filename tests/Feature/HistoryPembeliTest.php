<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HistoryPembeliTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_histori_pembeli_case_01()
    {
        $this->get('/login/user')->assertStatus(200);
        $this->post(route('user.loginUser'), [
            'email' => 'obi@gmail.com',
            'password' => '12345678'
        ])->assertRedirect(route('user.Home'));

        $this->get('/home/user/history/belanja')->
        assertSeeText('HISTORY BELANJA ANDA');
    }
}
