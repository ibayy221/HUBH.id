@extends('layouts.admin')

@section('content')
<div class="max-w-3xl rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <h1 class="text-2xl font-semibold text-gray-900">Edit Lisensi</h1>
    <p class="mt-1 text-sm text-gray-600">Perbarui data lisensi pelanggan.</p>

    <form action="{{ route('admin.licenses.update', $license) }}" method="POST" class="mt-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Pelanggan</label>
            <select name="user_id" class="w-full rounded-lg border-gray-300" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $license->user_id == $client->id ? 'selected' : '' }}>{{ $client->business_name ?? $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Produk</label>
            <select name="product_id" class="w-full rounded-lg border-gray-300" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $license->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Paket</label>
            <select name="package_id" class="w-full rounded-lg border-gray-300">
                <option value="">Tanpa paket</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" {{ $license->package_id == $package->id ? 'selected' : '' }}>{{ $package->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ $license->start_date->format('Y-m-d') }}" class="w-full rounded-lg border-gray-300" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
                <input type="date" name="end_date" value="{{ $license->end_date->format('Y-m-d') }}" class="w-full rounded-lg border-gray-300" required>
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="w-full rounded-lg border-gray-300" required>
                <option value="active" {{ $license->status === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="suspended" {{ $license->status === 'suspended' ? 'selected' : '' }}>Ditangguhkan</option>
                <option value="expired" {{ $license->status === 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
            </select>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">Catatan</label>
            <textarea name="note" rows="4" class="w-full rounded-lg border-gray-300">{{ $license->note }}</textarea>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.licenses.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700">Batal</a>
            <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Perbarui</button>
        </div>
    </form>
</div>
@endsection
