<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /** 
     * Test if the login page is accessible. 
     */
    public function testLoginPageIsAccessible()
    {
        // Visit the /login route
        $response = $this->get('/login');

        // Assert that the page is loaded correctly
        $response->assertStatus(200);

        // Check if the login page contains the text 'Log in'
        $response->assertSee('Log in');
    }
}

