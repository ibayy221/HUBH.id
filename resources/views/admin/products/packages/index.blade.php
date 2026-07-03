@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-sm font-medium text-sky-600">Paket Harga</p>
            <h2 class="text-2xl font-semibold text-slate-900">{{ $product->name }}</h2>
            <p class="mt-1 text-sm text-slate-500">Kelola paket langganan untuk aplikasi ini.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.products.show', $product) }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Kembali</a>
            <a href="{{ route('admin.products.packages.create', $product) }}" class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white">+ Tambah Paket</a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        @forelse($packages as $package)
            <div class="rounded-2xl border {{ $package->is_popular ? 'border-sky-400 bg-sky-50 shadow-sm' : 'border-slate-200 bg-white' }} p-6">
                @if($package->is_popular)
                    <span class="inline-flex rounded-full bg-sky-600 px-2.5 py-1 text-xs font-semibold text-white">Populer</span>
                @endif
                <h3 class="mt-3 text-xl font-semibold text-slate-900">{{ $package->name }}</h3>
                <p class="mt-2 text-sm text-slate-500">{{ $package->description }}</p>
                <div class="mt-4 flex items-end gap-2">
                    <span class="text-3xl font-semibold text-slate-900">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                </div>
                <p class="mt-2 text-sm text-slate-500">Durasi: {{ $package->duration_days }} hari</p>

                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    @foreach($package->features ?? [] as $feature)
                        <li class="rounded-lg bg-white/70 px-3 py-2">• {{ $feature }}</li>
                    @endforeach
                </ul>

                <div class="mt-6 flex gap-2">
                    <a href="{{ route('admin.products.packages.edit', [$product, $package]) }}" class="rounded-lg border border-sky-200 px-3 py-2 text-sm font-medium text-sky-700">Edit</a>
                    <form action="{{ route('admin.products.packages.destroy', [$product, $package]) }}" method="POST" onsubmit="return confirm('Hapus paket ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="rounded-lg border border-rose-200 px-3 py-2 text-sm font-medium text-rose-700">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-6 text-sm text-slate-500 xl:col-span-3">
                Belum ada paket untuk aplikasi ini.
            </div>
        @endforelse
    </div>
</div>
@endsection
