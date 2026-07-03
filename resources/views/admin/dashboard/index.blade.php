@extends('layouts.admin')

@section('content')
<!-- Custom CSS untuk Animasi Smooth -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
</style>

<div class="space-y-8 pb-10">
    <!-- Header Section -->
    <div class="animate-fade-in-up flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-600 ring-1 ring-inset ring-sky-500/20">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-sky-500"></span>
                </span>
                Overview Dashboard
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">Ringkasan Performa</h2>
            <p class="mt-2 text-sm text-slate-500">Monitor pertumbuhan client, pendapatan, support, dan lead dari satu tempat.</p>
        </div>
        <div class="flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-medium text-slate-600 shadow-sm ring-1 ring-slate-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            <!-- Menggunakan tanggal dinamis Laravel -->
            Update: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <!-- KPI Cards Grid -->
    <div class="animate-fade-in-up delay-100 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($stats as $stat)
            <!-- Membungkus component untuk efek hover global -->
            <div class="group transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/50">
                <x-admin.kpi-card
                    title="{{ $stat['title'] }}"
                    value="{{ $stat['value'] }}"
                    change="{{ $stat['change'] }}"
                    icon="{{ $stat['icon'] }}"
                    tone="{{ $stat['tone'] }}"
                />
            </div>
        @endforeach
    </div>

    <!-- Chart & Activity Section -->
    <div class="animate-fade-in-up delay-200 grid gap-6 xl:grid-cols-[2fr_1fr]">
        <!-- Chart -->
        <div class="flex flex-col rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Revenue 6 Bulan Terakhir</h3>
                    <p class="text-sm text-slate-500">Perkembangan tren pendapatan (Januari - Juni)</p>
                </div>
                <button class="rounded-lg p-2 text-slate-400 hover:bg-slate-50 hover:text-slate-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg>
                </button>
            </div>
            <div class="relative flex-1 w-full">
                <canvas id="revenueChart" class="w-full" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h3 class="mb-6 text-lg font-bold text-slate-900">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="group flex items-start gap-4 rounded-2xl border border-sky-100 bg-sky-50/50 p-4 transition hover:bg-sky-50">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" /><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-sky-900">3 Lead Baru</p>
                        <p class="text-xs text-sky-700/80">Dari campaign WhatsApp siang ini.</p>
                    </div>
                </div>

                <div class="group flex items-start gap-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 transition hover:bg-emerald-50">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-emerald-900">Onboarding Selesai</p>
                        <p class="text-xs text-emerald-700/80">2 client baru telah menyelesaikan setup.</p>
                    </div>
                </div>

                <div class="group flex items-start gap-4 rounded-2xl border border-amber-100 bg-amber-50/50 p-4 transition hover:bg-amber-50">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-amber-900">Tiket Urgent</p>
                        <p class="text-xs text-amber-700/80">1 tiket butuh tanggapan segera dari CS.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="animate-fade-in-up delay-300 overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="border-b border-slate-200 bg-white p-6">
            <h3 class="text-lg font-bold text-slate-900">5 Transaksi Terbaru</h3>
            <p class="text-sm text-slate-500">Daftar pembayaran dan status pesanan client terkini.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full whitespace-nowrap text-left text-sm text-slate-600">
                <thead class="bg-slate-50 font-medium text-slate-900">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID Transaksi</th>
                        <th scope="col" class="px-6 py-4">Client</th>
                        <th scope="col" class="px-6 py-4">Jumlah</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach($transactions as $transaction)
                        <tr class="transition hover:bg-slate-50/70">
                            <td class="px-6 py-4 font-semibold text-slate-900">#{{ $transaction['id'] }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-sky-700">
                                        {{ substr($transaction['client'], 0, 1) }}
                                    </div>
                                    {{ $transaction['client'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">{{ $transaction['amount'] }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold {{ $transaction['status'] === 'Lunas' ? 'bg-emerald-100 text-emerald-700' : ($transaction['status'] === 'Diproses' ? 'bg-sky-100 text-sky-700' : 'bg-amber-100 text-amber-700') }}">
                                    <!-- Indikator Dot Status -->
                                    <span class="h-1.5 w-1.5 rounded-full {{ $transaction['status'] === 'Lunas' ? 'bg-emerald-500' : ($transaction['status'] === 'Diproses' ? 'bg-sky-500' : 'bg-amber-500') }}">
                                    </span>
                                    {{ $transaction['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $transaction['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const revenueData = {{ json_encode($revenueData ?? [10, 25, 20, 45, 30, 60]) }};
    
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart');
        if (ctx) {
            const context = ctx.getContext('2d');
            
            // Membuat efek Gradien untuk Chart
            const gradientBg = context.createLinearGradient(0, 0, 0, 300);
            gradientBg.addColorStop(0, 'rgba(14, 165, 233, 0.4)');
            gradientBg.addColorStop(1, 'rgba(14, 165, 233, 0)');

            new Chart(context, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: revenueData,
                        borderColor: '#0ea5e9',
                        backgroundColor: gradientBg,
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 4,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#0ea5e9',
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: '#0ea5e9',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleFont: { size: 13, family: "'Inter', sans-serif" },
                            bodyFont: { size: 14, weight: 'bold', family: "'Inter', sans-serif" },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return 'Rp ' + context.parsed.y + ' Juta';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Inter', sans-serif" },
                                color: '#64748b'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            border: { display: false },
                            grid: {
                                color: '#f1f5f9',
                                borderDash: [5, 5]
                            },
                            ticks: {
                                font: { family: "'Inter', sans-serif" },
                                color: '#64748b',
                                callback: (value) => 'Rp ' + value + 'jt'
                            }
                        }
                    }
                }
            });
        }
    });
</script>

@endsection