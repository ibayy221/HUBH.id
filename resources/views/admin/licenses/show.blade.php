@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Detail Lisensi</h1>
            <p class="text-sm text-gray-600">Informasi lengkap lisensi pelanggan.</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('admin.licenses.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700">Kembali</a>
            <x-whatsapp-order-button :item="'Lisensi ' . $license->product->name" label="Pesan via WhatsApp" />
        </div>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <p class="text-sm font-medium text-gray-500">Pelanggan</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $license->user->business_name ?? $license->user->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Produk</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $license->product->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Kunci Lisensi</p>
                <p class="mt-1 font-mono text-sm text-gray-900">{{ $license->license_key }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Status</p>
                <span @class([
                    'mt-1 inline-flex rounded-full px-2.5 py-1 text-xs font-semibold',
                    'bg-green-100 text-green-700' => $license->status === 'active',
                    'bg-yellow-100 text-yellow-700' => $license->status === 'suspended',
                    'bg-red-100 text-red-700' => !in_array($license->status, ['active', 'suspended']),
                ])>
                    {{ ucfirst($license->status) }}
                </span>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Tanggal Mulai</p>
                <p class="mt-1 text-gray-900">{{ $license->start_date->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Tanggal Berakhir</p>
                <p class="mt-1 text-gray-900">{{ $license->end_date->format('d M Y') }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Catatan</p>
                <p class="mt-1 text-gray-900">{{ $license->note ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
