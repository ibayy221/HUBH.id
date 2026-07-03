@props(['item', 'label' => 'Pesan Sekarang'])

@php
    $phone = '6285891602476';
    $text = "Halo, saya tertarik dengan produk {$item}. Mohon informasi lebih lanjut dan cara pemesanan.";
    $url = 'https://wa.me/' . $phone . '?text=' . urlencode($text);
@endphp

<a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-700">
    {{ $label }}
</a>
