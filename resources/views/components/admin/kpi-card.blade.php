@props(['title', 'value', 'change', 'icon', 'tone' => 'blue'])

@php
    $toneClasses = match($tone) {
        'green' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
        'purple' => 'border-violet-200 bg-violet-50 text-violet-700',
        'amber' => 'border-amber-200 bg-amber-50 text-amber-700',
        'red' => 'border-rose-200 bg-rose-50 text-rose-700',
        default => 'border-sky-200 bg-sky-50 text-sky-700',
    };
@endphp

<div class="rounded-2xl border bg-white p-5 shadow-sm">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $title }}</p>
            <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $value }}</p>
        </div>
        <div class="rounded-xl border px-3 py-2 text-xl {{ $toneClasses }}">{{ $icon }}</div>
    </div>
    <p class="mt-4 text-sm text-slate-500">{{ $change }}</p>
</div>
