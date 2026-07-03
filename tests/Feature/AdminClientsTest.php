<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminClientsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_clients_index_page_can_be_rendered(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-clients@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Client Test',
            'email' => 'client@example.com',
            'password' => Hash::make('password123'),
            'business_name' => 'Toko Suka',
            'business_category' => 'Retail',
            'pic_name' => 'Budi',
            'phone' => '081234567890',
            'address' => 'Jakarta',
            'status' => 'active',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/clients');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Client');
    }
}
