@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Daftar Aplikasi</h1>
            <p class="text-sm text-gray-600">Kelola katalog aplikasi dan paket yang tersedia untuk pelanggan.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
            + Tambah Produk
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Produk</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Platform</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-900">{{ $product->name }}</div>
                            <div class="text-xs text-gray-500">{{ Str::limit($product->description, 80) }}</div>
                        </td>
                        <td class="px-4 py-3 uppercase text-gray-600">{{ $product->platform }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $product->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Edit</a>
                                <a href="{{ route('admin.products.show', $product) }}" class="text-indigo-600">Detail</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection