<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterPenjualTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_penjual_case_3()
    {
        $response = $this->get('/register/penjual');

        $response->assertStatus(200);
    }
}
