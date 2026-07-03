@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-5xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-slate-900">Edit Aplikasi</h2>
        <p class="mt-1 text-sm text-slate-500">Perbarui informasi katalog aplikasi.</p>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Nama Aplikasi</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2" required>
                @error('name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                @error('slug')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full rounded-xl border border-slate-300 px-3 py-2">{{ old('description', $product->description) }}</textarea>
            @error('description')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Deskripsi Singkat</label>
                <input type="text" name="short_description" value="{{ old('short_description', $product->short_description) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                @error('short_description')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Platform</label>
                <select name="platform" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    <option value="both" {{ old('platform', $product->platform) === 'both' ? 'selected' : '' }}>Android / iOS</option>
                    <option value="android" {{ old('platform', $product->platform) === 'android' ? 'selected' : '' }}>Android</option>
                    <option value="ios" {{ old('platform', $product->platform) === 'ios' ? 'selected' : '' }}>iOS</option>
                </select>
                @error('platform')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Thumbnail</label>
            @if($product->thumbnail)
                <img src="{{ Storage::disk('public')->url($product->thumbnail) }}" alt="thumbnail" class="mb-3 h-24 w-24 rounded-xl object-cover">
            @endif
            <input type="file" name="thumbnail" class="w-full rounded-xl border border-slate-300 px-3 py-2">
            @error('thumbnail')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-slate-700">Fitur</label>
            <div id="features-wrapper" class="space-y-2">
                @php($features = old('features', $product->features ?? []))
                @if(!empty($features))
                    @foreach($features as $feature)
                        <input type="text" name="features[]" value="{{ $feature }}" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                    @endforeach
                @else
                    <input type="text" name="features[]" class="w-full rounded-xl border border-slate-300 px-3 py-2">
                @endif
            </div>
            <button type="button" id="add-feature" class="mt-3 rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-700">+ Tambah fitur</button>
        </div>

        <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-2 rounded-xl border border-slate-300 px-3 py-2">
                <input type="checkbox" name="status" value="active" {{ old('status', $product->status) === 'active' ? 'checked' : '' }} class="rounded border-slate-300">
                <span class="text-sm text-slate-700">Aktif</span>
            </label>
            <span class="text-sm text-slate-500">Status aplikasi</span>
        </div>

        <div class="flex gap-3">
            <button class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white">Perbarui</button>
            <a href="{{ route('admin.products.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700">Batal</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-feature')?.addEventListener('click', function () {
        const wrapper = document.getElementById('features-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'features[]';
        input.className = 'w-full rounded-xl border border-slate-300 px-3 py-2';
        input.placeholder = 'Fitur lain';
        wrapper.appendChild(input);
    });
</script>
@endsection
