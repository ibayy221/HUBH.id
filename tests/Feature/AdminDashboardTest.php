<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_page_can_be_rendered(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Overview Dashboard');
        $response->assertSee('Total Client Aktif');
    }

    public function test_admin_sidebar_routes_are_available(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-sidebar@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/keuangan');
        $response->assertStatus(200);
    }

    public function test_admin_login_redirects_to_admin_dashboard_even_when_intended_url_is_customer_login(): void
    {
        Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-login@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->withSession(['url.intended' => route('dashboard.login')])
            ->post('/admin/login', [
                'email' => 'admin-login@hubh.id',
                'password' => 'password123',
            ]);

        $response->assertRedirect('/admin/dashboard');
    }

    public function test_admin_logout_redirects_to_admin_login(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-logout@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest('admin');
    }
}
