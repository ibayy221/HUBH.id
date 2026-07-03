@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Manajemen Lisensi</h1>
            <p class="text-sm text-gray-600">Pantau status lisensi, masa aktif, dan pelanggan yang terhubung.</p>
        </div>
        <a href="{{ route('admin.licenses.create') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ Tambah Lisensi</a>
    </div>

    <form method="GET" class="grid gap-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm md:grid-cols-3">
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="w-full rounded-lg border-gray-300">
                <option value="">Semua</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Ditangguhkan</option>
                <option value="expired" {{ request('status') === 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
            </select>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Produk</label>
            <select name="product_id" class="w-full rounded-lg border-gray-300">
                <option value="">Semua</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white">Filter</button>
        </div>
    </form>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Pelanggan</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Produk</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Kunci</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Masa Aktif</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($licenses as $license)
                    <tr @class([
                        'bg-red-50' => $license->status === 'expired' || $license->end_date < now(),
                        'bg-yellow-50' => $license->end_date <= now()->addDays(7),
                    ])>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-900">{{ $license->user->business_name ?? $license->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $license->user->email }}</div>
                        </td>
                        <td class="px-4 py-3">{{ $license->product->name }}</td>
                        <td class="px-4 py-3 font-mono text-xs">{{ $license->license_key }}</td>
                        <td class="px-4 py-3">{{ $license->start_date->format('d M Y') }} - {{ $license->end_date->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'rounded-full px-2.5 py-1 text-xs font-semibold',
                                'bg-green-100 text-green-700' => $license->status === 'active',
                                'bg-yellow-100 text-yellow-700' => $license->status === 'suspended',
                                'bg-red-100 text-red-700' => !in_array($license->status, ['active', 'suspended']),
                            ])>
                                {{ ucfirst($license->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.licenses.show', $license) }}" class="text-sm text-indigo-600">Detail</a>
                                <a href="{{ route('admin.licenses.edit', $license) }}" class="text-sm text-blue-600">Edit</a>
                                <form action="{{ route('admin.licenses.toggle-status', $license) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="text-sm text-amber-600">{{ $license->status === 'active' ? 'Suspend' : 'Aktifkan' }}</button>
                                </form>
                                <form action="{{ route('admin.licenses.destroy', $license) }}" method="POST" class="inline" onsubmit="return confirm('Hapus lisensi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm text-red-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada lisensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $licenses->links() }}
    </div>
</div>
@endsection
