<?php

namespace Tests\Feature;


use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_view_visible()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_incorrect_credentials()
    {

        $response = $this->from('/login')->post('/loginpost', [
            'username' => 'johndoe',
            'password' => 'invalid-password',
        ]);
    
        $response->assertRedirect('/login');
    }
    public function test_correct_credentials()
    {

        $response = $this->from('/login')->post('/loginpost', [
            'username' => 'john.doe',
            'password' => '12345678',
        ]);
    
        $response->assertRedirect('/dashboard');
    
    }

    public function test_missing_fields()
    {

        $response = $this->from('/login')->post('/loginpost', [
            'username' => '',
            'password' => '12345678',
        ]);
    
        $response->assertRedirect('/login');
    }
}
