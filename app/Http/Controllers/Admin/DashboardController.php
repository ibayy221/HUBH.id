<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            [
                'title' => 'Total Client Aktif',
                'value' => '128',
                'change' => '+12% vs bulan lalu',
                'icon' => '👥',
                'tone' => 'blue',
            ],
            [
                'title' => 'Total Revenue Bulan Ini',
                'value' => 'Rp 84.250.000',
                'change' => '+8.4% vs bulan lalu',
                'icon' => '💰',
                'tone' => 'green',
            ],
            [
                'title' => 'Lisensi Aktif',
                'value' => '94',
                'change' => '87% terpakai',
                'icon' => '🛡️',
                'tone' => 'purple',
            ],
            [
                'title' => 'Lead Baru (bulan ini)',
                'value' => '36',
                'change' => '14 lead dari channel organic',
                'icon' => '📈',
                'tone' => 'amber',
            ],
            [
                'title' => 'Tiket Support Open',
                'value' => '8',
                'change' => '2 butuh follow-up',
                'icon' => '🎧',
                'tone' => 'red',
            ],
        ];

        $transactions = [
            ['id' => 'INV-1024', 'client' => 'Batik Nusantara', 'amount' => 'Rp 12.500.000', 'status' => 'Lunas', 'date' => '2026-06-24'],
            ['id' => 'INV-1023', 'client' => 'Kopi Kenangan', 'amount' => 'Rp 8.900.000', 'status' => 'Diproses', 'date' => '2026-06-22'],
            ['id' => 'INV-1022', 'client' => 'Toko Rahayu', 'amount' => 'Rp 5.200.000', 'status' => 'Lunas', 'date' => '2026-06-21'],
            ['id' => 'INV-1021', 'client' => 'Mitra Digital', 'amount' => 'Rp 15.750.000', 'status' => 'Menunggu', 'date' => '2026-06-19'],
            ['id' => 'INV-1020', 'client' => 'Sari Mie', 'amount' => 'Rp 3.400.000', 'status' => 'Lunas', 'date' => '2026-06-17'],
        ];

        $revenueData = [42, 58, 64, 71, 76, 84];

        return view('admin.dashboard.index', compact('stats', 'transactions', 'revenueData'));
    }
}
