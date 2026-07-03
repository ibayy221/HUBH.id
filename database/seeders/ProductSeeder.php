<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::firstOrCreate(
            ['slug' => 'pos-kasir'],
            [
                'name' => 'POS & Kasir',
                'description' => 'Sistem point of sale yang lengkap untuk mengelola transaksi penjualan, inventory, dan laporan keuangan real-time. Dilengkapi dengan fitur multi-outlet, integrasi payment gateway, dan printing otomatis.',
                'short_description' => 'Sistem transaksi cepat, manajemen stok, dan laporan harian otomatis.',
                'platform' => 'both',
                'status' => 'active',
                'features' => [
                    'Manajemen Transaksi Real-time',
                    'Tracking Inventori Otomatis',
                    'Laporan Penjualan & Keuntungan',
                    'Multi-Outlet Support',
                    'Integrasi Payment Gateway',
                    'Cetak Struk & Receipt',
                ],
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'cafe-order'],
            [
                'name' => 'Cafe Order',
                'description' => 'Aplikasi manajemen pesanan untuk kafe dan restoran. Kelola meja, pesanan pelanggan, status dapur, dan otomatisasi notifikasi. Sempurna untuk F&B business dengan traffic tinggi.',
                'short_description' => 'Atur pesanan pelanggan, manajemen meja, dan cetak struk dapur ringkas.',
                'platform' => 'both',
                'status' => 'active',
                'features' => [
                    'Manajemen Meja Digital',
                    'Queue Pesanan Dapur',
                    'Notifikasi Real-time',
                    'Integrasi Delivery',
                    'QR Code Menu',
                    'Laporan Penjualan F&B',
                ],
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'laundry-manager'],
            [
                'name' => 'Laundry Manager',
                'description' => 'Platform manajemen lengkap untuk bisnis laundry dan dry cleaning. Track pesanan, notifikasi WhatsApp otomatis, manajemen harga, dan reminder pickup delivery yang terintegrasi.',
                'short_description' => 'Pantau status cucian, notifikasi WhatsApp otomatis, dan kelola parfum.',
                'platform' => 'both',
                'status' => 'active',
                'features' => [
                    'Tracking Pesanan Real-time',
                    'Notifikasi WhatsApp Otomatis',
                    'Manajemen Harga Dinamis',
                    'Queue Washing Machine',
                    'Integrasi Delivery Driver',
                    'Laporan Profit per Item',
                ],
            ]
        );
    }
}
