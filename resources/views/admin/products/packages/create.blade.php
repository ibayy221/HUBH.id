@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-4xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-slate-900">Tambah Paket</h2>
        <p class="mt-1 text-sm text-slate-500">Buat paket harga untuk {{ $product->name }}.</p>
    </div>

    <form action="{{ route('admin.products.packages.store', $product) }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama Paket</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" min="0" required>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Durasi</label>
                <select name="duration_days" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    <option value="30" {{ old('duration_days') == '30' ? 'selected' : '' }}>30 hari</option>
                    <option value="90" {{ old('duration_days') == '90' ? 'selected' : '' }}>90 hari</option>
                    <option value="180" {{ old('duration_days') == '180' ? 'selected' : '' }}>180 hari</option>
                    <option value="365" {{ old('duration_days') == '365' ? 'selected' : '' }}>365 hari</option>
                    <option value="3650" {{ old('duration_days') == '3650' ? 'selected' : '' }}>Seumur Hidup</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Status</label>
                <select name="status" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full rounded-xl border border-slate-300 px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Fitur yang termasuk</label>
            <textarea name="features" rows="5" class="w-full rounded-xl border border-slate-300 px-3 py-2" placeholder="Satu fitur per baris">{{ old('features') }}</textarea>
            <p class="mt-1 text-sm text-slate-500">Pisahkan fitur dengan enter.</p>
        </div>

        <label class="inline-flex items-center gap-2 rounded-xl border border-slate-300 px-3 py-2">
            <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
            <span class="text-sm text-slate-700">Paling Populer</span>
        </label>

        <div class="flex gap-3">
            <button class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white">Simpan</button>
            <a href="{{ route('admin.products.packages.index', $product) }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Batal</a>
        </div>
    </form>
</div>
@endsection
