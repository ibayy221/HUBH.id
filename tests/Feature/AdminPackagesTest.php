<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPackagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_product_packages_page(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-packages@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $product = Product::create([
            'name' => 'HUBH CRM',
            'slug' => 'hubh-crm',
            'description' => 'CRM',
            'platform' => 'both',
            'status' => 'active',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/products/' . $product->id . '/packages');

        $response->assertStatus(200);
        $response->assertSee('Paket Harga');
    }

    public function test_admin_can_create_package(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-packages2@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $product = Product::create([
            'name' => 'HUBH CRM',
            'slug' => 'hubh-crm',
            'description' => 'CRM',
            'platform' => 'both',
            'status' => 'active',
        ]);

        $response = $this->actingAs($admin, 'admin')->post('/admin/products/' . $product->id . '/packages', [
            'name' => 'Pro',
            'price' => '1250000',
            'duration_days' => '90',
            'description' => 'Paket Pro',
            'features' => "- Dashboard\n- Laporan",
            'is_popular' => '1',
            'status' => 'active',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('packages', [
            'product_id' => $product->id,
            'name' => 'Pro',
        ]);
    }
}
