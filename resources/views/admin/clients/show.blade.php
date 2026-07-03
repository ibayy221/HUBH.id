@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-medium text-sky-600">Detail Client</p>
                <h2 class="text-2xl font-semibold text-slate-900">{{ $client->business_name }}</h2>
                <p class="mt-2 text-sm text-slate-500">PIC: {{ $client->pic_name }} · {{ $client->email }}</p>
            </div>
            <div class="flex gap-3">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('admin.clients.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Kembali</a>
                    <x-whatsapp-order-button :item="'Client ' . $client->name" label="Pesan via WhatsApp" />
                </div>
                <form action="{{ route('admin.clients.toggle-status', $client) }}" method="POST">
                    @csrf
                    <button class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white">{{ $client->status === 'active' ? 'Suspend' : 'Aktifkan' }} Akun</button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Informasi Bisnis</h3>
            <div class="mt-4 space-y-3 text-sm text-slate-600">
                <p><span class="font-semibold">Nama Bisnis:</span> {{ $client->business_name }}</p>
                <p><span class="font-semibold">Kategori:</span> {{ $client->business_category }}</p>
                <p><span class="font-semibold">PIC:</span> {{ $client->pic_name }}</p>
                <p><span class="font-semibold">Telepon:</span> {{ $client->phone ?? '-' }}</p>
                <p><span class="font-semibold">Alamat:</span> {{ $client->address ?? '-' }}</p>
                <p><span class="font-semibold">Status:</span> <span class="rounded-full px-2.5 py-1 text-xs font-medium {{ $client->status === 'active' ? 'bg-emerald-100 text-emerald-700' : ($client->status === 'suspended' ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700') }}">{{ ucfirst($client->status) }}</span></p>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Lisensi Aktif</h3>
            <div class="mt-4 space-y-3 text-sm text-slate-600">
                <div class="rounded-xl bg-slate-50 p-3">Belum ada lisensi aktif.</div>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-semibold text-slate-900">Riwayat Transaksi</h3>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-left text-slate-500">
                        <th class="pb-3 font-medium">Invoice</th>
                        <th class="pb-3 font-medium">Jumlah</th>
                        <th class="pb-3 font-medium">Status</th>
                        <th class="pb-3 font-medium">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-100">
                        <td class="py-3 text-slate-600">INV-1001</td>
                        <td class="py-3 text-slate-600">Rp 3.500.000</td>
                        <td class="py-3 text-slate-600">Lunas</td>
                        <td class="py-3 text-slate-600">2026-06-20</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
