<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function register_user_test(){


        $response = $this->post(route('register', [
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => 'test'
        ]));

        $this->assertDatabaseHas('users', [

            'email' => 'sally@example.com',
        
        ]);

    }
}
