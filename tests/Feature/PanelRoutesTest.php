<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

class PanelRoutesTest extends \Tests\TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }

    public function test_customer_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard/login');
    }
}
