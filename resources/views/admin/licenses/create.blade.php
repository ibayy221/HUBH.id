@extends('layouts.admin')

@section('content')
<div class="max-w-3xl rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <h1 class="text-2xl font-semibold text-gray-900">Tambah Lisensi</h1>
    <p class="mt-1 text-sm text-gray-600">Buat lisensi baru untuk pelanggan dan produk tertentu.</p>

    <form action="{{ route('admin.licenses.store') }}" method="POST" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Pelanggan</label>
            <select name="user_id" class="w-full rounded-lg border-gray-300" required>
                <option value="">Pilih pelanggan</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->business_name ?? $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Produk</label>
            <select name="product_id" class="w-full rounded-lg border-gray-300" required>
                <option value="">Pilih produk</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Paket</label>
            <select name="package_id" class="w-full rounded-lg border-gray-300">
                <option value="">Tanpa paket</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="start_date" class="w-full rounded-lg border-gray-300" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
                <input type="date" name="end_date" class="w-full rounded-lg border-gray-300" required>
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="w-full rounded-lg border-gray-300" required>
                <option value="active">Aktif</option>
                <option value="suspended">Ditangguhkan</option>
                <option value="expired">Kadaluarsa</option>
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Catatan</label>
            <textarea name="note" rows="4" class="w-full rounded-lg border-gray-300"></textarea>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.licenses.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700">Batal</a>
            <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection
