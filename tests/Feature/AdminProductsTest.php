<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_products_index_page_can_be_rendered(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/products');

        $response->assertStatus(200);
        $response->assertSee('Daftar Aplikasi');
    }

    public function test_admin_can_create_product(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin2@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->post('/admin/products', [
            'name' => 'HUBH CRM',
            'slug' => 'hubh-crm',
            'description' => 'Aplikasi CRM untuk UMKM.',
            'short_description' => 'CRM sederhana',
            'platform' => 'both',
            'status' => 'active',
            'features' => ['Dashboard', 'Laporan'],
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'slug' => 'hubh-crm',
            'name' => 'HUBH CRM',
        ]);
    }
}
