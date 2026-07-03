@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Manajemen Client</h2>
            <p class="mt-1 text-sm text-slate-500">Kelola client/UMKM yang sudah terdaftar di HUBH.id.</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white">+ Tambah Client</a>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-6">
        <form method="GET" class="flex flex-col gap-3 md:flex-row md:items-end">
            <div class="flex-1">
                <label class="mb-1 block text-sm font-medium text-slate-600">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama bisnis atau email" class="w-full rounded-xl border border-slate-300 px-3 py-2">
            </div>
            <div class="md:w-48">
                <label class="mb-1 block text-sm font-medium text-slate-600">Status</label>
                <select name="status" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    <option value="">Semua</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="md:w-48">
                <label class="mb-1 block text-sm font-medium text-slate-600">Kategori</label>
                <input type="text" name="category" value="{{ request('category') }}" placeholder="Retail" class="w-full rounded-xl border border-slate-300 px-3 py-2">
            </div>
            <button class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white">Filter</button>
        </form>

        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-left text-slate-500">
                        <th class="pb-3 font-medium">Nama Bisnis</th>
                        <th class="pb-3 font-medium">PIC</th>
                        <th class="pb-3 font-medium">Email</th>
                        <th class="pb-3 font-medium">Telepon</th>
                        <th class="pb-3 font-medium">Kategori</th>
                        <th class="pb-3 font-medium">Status</th>
                        <th class="pb-3 font-medium">Tanggal Daftar</th>
                        <th class="pb-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr class="border-b border-slate-100">
                            <td class="py-3 font-semibold text-slate-800">{{ $client->business_name ?? '-' }}</td>
                            <td class="py-3 text-slate-600">{{ $client->pic_name ?? '-' }}</td>
                            <td class="py-3 text-slate-600">{{ $client->email }}</td>
                            <td class="py-3 text-slate-600">{{ $client->phone ?? '-' }}</td>
                            <td class="py-3 text-slate-600">{{ $client->business_category ?? '-' }}</td>
                            <td class="py-3">
                                <span class="rounded-full px-2.5 py-1 text-xs font-medium {{ $client->status === 'active' ? 'bg-emerald-100 text-emerald-700' : ($client->status === 'suspended' ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700') }}">{{ ucfirst($client->status) }}</span>
                            </td>
                            <td class="py-3 text-slate-600">{{ $client->created_at->format('d M Y') }}</td>
                            <td class="py-3">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.clients.show', $client) }}" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-medium text-slate-700">Detail</a>
                                    <a href="{{ route('admin.clients.edit', $client) }}" class="rounded-lg border border-sky-200 px-3 py-1.5 text-xs font-medium text-sky-700">Edit</a>
                                    <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Hapus client ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-medium text-rose-700">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-slate-500">Belum ada client.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $clients->links() }}
        </div>
    </div>
</div>
@endsection
