<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminLicensesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_licenses_index_page_can_be_rendered(): void
    {
        $admin = Admin::create([
            'name' => 'Admin Hubh',
            'email' => 'admin-licenses@hubh.id',
            'password' => Hash::make('password123'),
        ]);

        $user = User::create([
            'name' => 'Client',
            'email' => 'client-license@example.com',
            'password' => Hash::make('password123'),
            'business_name' => 'Toko Kita',
            'business_category' => 'Retail',
            'pic_name' => 'Andi',
            'phone' => '0812',
            'address' => 'Bandung',
            'status' => 'active',
        ]);

        $product = Product::create([
            'name' => 'HUBH POS',
            'slug' => 'hubh-pos',
            'description' => 'POS',
            'platform' => 'both',
            'status' => 'active',
        ]);

        $package = Package::create([
            'product_id' => $product->id,
            'name' => 'Basic',
            'price' => 100000,
            'duration_days' => 30,
            'description' => 'Basic',
            'features' => ['A'],
            'status' => 'active',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/licenses');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Lisensi');
    }
}
