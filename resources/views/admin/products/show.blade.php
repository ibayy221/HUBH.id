@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-medium text-sky-600">Detail Produk</p>
                <h2 class="text-2xl font-semibold text-slate-900">{{ $product->name }}</h2>
                <p class="mt-2 text-sm text-slate-500">{{ $product->short_description }}</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="{{ route('admin.products.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Kembali</a>
                <x-whatsapp-order-button :item="$product->name" label="Pesan via WhatsApp" />
            </div>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Deskripsi</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">{{ $product->description ?: 'Tidak ada deskripsi.' }}</p>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-slate-900">Fitur</h3>
                <ul class="mt-3 space-y-2 text-sm text-slate-600">
                    @forelse($product->features ?? [] as $feature)
                        <li class="rounded-lg bg-slate-50 px-3 py-2">• {{ $feature }}</li>
                    @empty
                        <li class="text-slate-500">Belum ada fitur.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @if($product->thumbnail)
                <img src="{{ Storage::disk('public')->url($product->thumbnail) }}" alt="thumbnail" class="h-48 w-full rounded-xl object-cover">
            @else
                <div class="flex h-48 items-center justify-center rounded-xl bg-slate-100 text-slate-500">Tidak ada thumbnail</div>
            @endif

            <div class="mt-4 space-y-2 text-sm text-slate-600">
                <p><span class="font-semibold">Platform:</span> {{ ucfirst($product->platform) }}</p>
                <p><span class="font-semibold">Status:</span> {{ ucfirst($product->status) }}</p>
                <p><span class="font-semibold">Slug:</span> {{ $product->slug }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
