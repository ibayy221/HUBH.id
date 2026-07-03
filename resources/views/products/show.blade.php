@extends('layouts.public')

@section('content')
<div class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] bg-white shadow-xl ring-1 ring-slate-200 overflow-hidden">
        <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 px-8 py-12 text-white">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-300">{{ ucfirst($product->platform === 'both' ? 'Android / iOS' : $product->platform) }}</p>
                    <h1 class="mt-3 text-4xl font-extrabold tracking-tight sm:text-5xl">{{ $product->name }}</h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-slate-200">{{ $product->short_description }}</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="https://wa.me/6285891602476?text={{ urlencode('Halo, saya tertarik dengan produk ' . $product->name . '. Mohon informasi lebih lanjut dan cara pemesanan.') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-700">
                        Pesan via WhatsApp
                    </a>
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-slate-900/10 transition hover:bg-slate-100">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        <div class="grid gap-10 p-8 md:grid-cols-[1.4fr_0.6fr]">
            <div class="space-y-8">
                <section class="space-y-4 rounded-3xl bg-slate-50 p-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-900">Tentang {{ $product->name }}</h2>
                            <p class="mt-2 text-sm text-slate-500">{{ $product->description }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white">{{ ucfirst($product->status) }}</div>
                    </div>
                </section>

                <section class="rounded-3xl bg-slate-50 p-8">
                    <h3 class="text-lg font-semibold text-slate-900">Fitur Utama</h3>
                    <ul class="mt-6 space-y-3 text-sm text-slate-600">
                        @forelse($product->features ?? [] as $feature)
                            <li class="rounded-3xl bg-white px-4 py-3 shadow-sm">• {{ $feature }}</li>
                        @empty
                            <li class="rounded-3xl bg-white px-4 py-3 shadow-sm text-slate-500">Belum ada fitur yang ditambahkan untuk produk ini.</li>
                        @endforelse
                    </ul>
                </section>
            </div>

            <aside class="space-y-8">
                @if($product->thumbnail)
                    <div class="overflow-hidden rounded-[2rem] bg-slate-900 shadow-xl">
                        <img src="{{ Storage::disk('public')->url($product->thumbnail) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover" />
                    </div>
                @else
                    <div class="flex h-64 items-center justify-center rounded-[2rem] bg-slate-100 text-slate-500">Tidak ada gambar</div>
                @endif

                <div class="rounded-3xl bg-slate-50 p-8 shadow-sm">
                    <h3 class="text-lg font-semibold text-slate-900">Detail Produk</h3>
                    <dl class="mt-4 space-y-4 text-sm text-slate-600">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="font-medium text-slate-900">Nama</dt>
                            <dd>{{ $product->name }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="font-medium text-slate-900">Slug</dt>
                            <dd>{{ $product->slug }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="font-medium text-slate-900">Platform</dt>
                            <dd>{{ ucfirst($product->platform) }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="font-medium text-slate-900">Status</dt>
                            <dd>{{ ucfirst($product->status) }}</dd>
                        </div>
                    </dl>
                </div>
            </aside>
        </div>
    </div>
@endsection
