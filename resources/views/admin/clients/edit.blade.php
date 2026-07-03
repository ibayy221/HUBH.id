@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-5xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-slate-900">Edit Client</h2>
        <p class="mt-1 text-sm text-slate-500">Perbarui data client/UMKM.</p>
    </div>

    <form action="{{ route('admin.clients.update', $client) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $client->name) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $client->email) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" class="w-full rounded-xl border border-slate-300 px-3 py-2" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Status</label>
                <select name="status" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    <option value="pending" {{ old('status', $client->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="active" {{ old('status', $client->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ old('status', $client->status) === 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama Bisnis</label>
                <input type="text" name="business_name" value="{{ old('business_name', $client->business_name) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Kategori Bisnis</label>
                <input type="text" name="business_category" value="{{ old('business_category', $client->business_category) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">PIC</label>
                <input type="text" name="pic_name" value="{{ old('pic_name', $client->pic_name) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2">
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Alamat</label>
            <textarea name="address" rows="3" class="w-full rounded-xl border border-slate-300 px-3 py-2">{{ old('address', $client->address) }}</textarea>
        </div>

        <div class="flex gap-3">
            <button class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white">Perbarui</button>
            <a href="{{ route('admin.clients.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Batal</a>
        </div>
    </form>
</div>
@endsection
