<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HUBH.id | Marketplace Aplikasi Bisnis Siap Pakai</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body { font-family: 'Plus Jakarta Sans', sans-serif; }
            </style>
        @endif

        <style>
            .reveal {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }
            .delay-100 { transition-delay: 100ms; }
            .delay-200 { transition-delay: 200ms; }
            .delay-300 { transition-delay: 300ms; }
            
            /* Hide scrollbar for clean horizontal scrolls if needed */
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </head>
    <body class="bg-[#FAFCFF] text-slate-800 antialiased selection:bg-[#4A8CFF] selection:text-white">
        <div class="relative overflow-hidden">
            <div class="absolute inset-x-0 top-0 -z-10 h-[800px] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#e0edff] via-transparent to-transparent opacity-80"></div>
            <div class="absolute right-0 top-0 -z-10 h-[600px] w-[600px] translate-x-1/3 -translate-y-1/4 rounded-full bg-blue-400/10 blur-[120px]"></div>

            <header id="navbar" class="fixed inset-x-0 top-0 z-50 border-b border-transparent bg-white/0 transition-all duration-300">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                    <a href="#" class="group flex items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="HUBH Logo" class="h-8 w-8 object-contain transition-transform group-hover:rotate-12">
                        <span class="text-xl font-bold tracking-tight text-slate-900">HUBH.id</span>
                    </a>
                    <nav class="hidden items-center gap-8 text-sm font-semibold text-slate-500 lg:flex">
                        <a href="#home" class="transition-colors hover:text-[#4A8CFF]">Home</a>
                        <a href="#products" class="transition-colors hover:text-[#4A8CFF]">Products</a>
                        <a href="#categories" class="transition-colors hover:text-[#4A8CFF]">Categories</a>
                        <a href="#pricing" class="transition-colors hover:text-[#4A8CFF]">Pricing</a>
                    </nav>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.login') }}" class="hidden text-sm font-semibold text-slate-600 transition-colors hover:text-[#4A8CFF] sm:block">Login</a>
                        <a href="#products" class="rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-slate-900/20 transition-all hover:-translate-y-0.5 hover:bg-[#4A8CFF] hover:shadow-[#4A8CFF]/30">Get Started</a>
                    </div>
                </div>
            </header>

            <main id="home" class="mx-auto max-w-7xl px-6 pb-20 pt-32 lg:px-8 lg:pt-40">
                <section class="grid items-center gap-16 lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="reveal">
                        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white/50 py-1 pl-1 pr-4 text-xs font-semibold text-[#4A8CFF] shadow-sm backdrop-blur-md">
                            <span class="flex h-6 items-center rounded-full bg-blue-100 px-3 text-[#2a6fd9]">Baru rilis</span>
                            Marketplace aplikasi bisnis siap pakai
                        </div>
                        <h1 class="max-w-2xl text-5xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-6xl lg:text-7xl">
                            Transformasi <span class="bg-gradient-to-r from-[#4A8CFF] to-[#2a6fd9] bg-clip-text text-transparent">Digital</span> Bisnismu.
                        </h1>
                        <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-600">
                            HUBH.id membantu UMKM, cafe, retail, dan berbagai bisnis menemukan aplikasi terbaik tanpa pusing membuat dari nol. Langsung pakai, langsung cuan.
                        </p>
                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            <a href="#products" class="group relative flex items-center gap-2 rounded-full bg-[#4A8CFF] px-8 py-3.5 text-sm font-semibold text-white shadow-xl shadow-[#4A8CFF]/30 transition-all hover:-translate-y-1 hover:bg-[#3b7eed] hover:shadow-[#4A8CFF]/40">
                                Eksplor Aplikasi
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#about" class="flex items-center gap-2 rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-slate-700 ring-1 ring-inset ring-slate-200 transition-all hover:bg-slate-50">
                                Pelajari Sistem
                            </a>
                        </div>

                        <div class="mt-12 flex items-center gap-8 border-t border-slate-200 pt-8 text-sm text-slate-600">
                            <div><strong class="text-2xl font-black text-slate-900">100+</strong><span class="block">Aplikasi Aktif</span></div>
                            <div class="h-10 w-px bg-slate-200"></div>
                            <div><strong class="text-2xl font-black text-slate-900">500+</strong><span class="block">Bisnis Bergabung</span></div>
                            <div class="h-10 w-px bg-slate-200"></div>
                            <div><strong class="text-2xl font-black text-slate-900">4.9</strong><span class="block">Rating Kepuasan</span></div>
                        </div>
                    </div>

                    <div class="reveal delay-200 relative mx-auto w-full max-w-xl">
                        <div class="absolute -left-10 top-10 h-32 w-32 rounded-full bg-blue-300/40 blur-[50px]"></div>
                        <div class="absolute -right-4 bottom-10 h-40 w-40 rounded-full bg-indigo-300/30 blur-[60px]"></div>
                        
                        <div class="group relative overflow-hidden rounded-[2rem] border border-white/60 bg-white/40 p-4 shadow-2xl shadow-blue-900/5 backdrop-blur-2xl transition-transform hover:scale-[1.02]">
                            <div class="relative overflow-hidden rounded-[1.5rem] bg-slate-900 p-6 ring-1 ring-white/10">
                                <div class="mb-6 flex items-center justify-between border-b border-white/10 pb-4">
                                    <div class="flex gap-2">
                                        <div class="h-3 w-3 rounded-full bg-red-500/80"></div>
                                        <div class="h-3 w-3 rounded-full bg-yellow-500/80"></div>
                                        <div class="h-3 w-3 rounded-full bg-green-500/80"></div>
                                    </div>
                                    <p class="text-xs font-medium text-slate-400">Dashboard Live</p>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-4 rounded-2xl bg-white/5 p-4">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-500 text-white shadow-lg shadow-blue-500/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-slate-400">Total Pendapatan</p>
                                            <p class="text-xl font-bold text-white">Rp 24.500.000</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="rounded-2xl bg-white/5 p-4">
                                            <div class="mb-2 h-2 w-12 rounded-full bg-white/20"></div>
                                            <div class="h-2 w-full rounded-full bg-white/10">
                                                <div class="h-2 w-3/4 rounded-full bg-blue-400"></div>
                                            </div>
                                        </div>
                                        <div class="rounded-2xl bg-white/5 p-4">
                                            <div class="mb-2 h-2 w-16 rounded-full bg-white/20"></div>
                                            <div class="h-2 w-full rounded-full bg-white/10">
                                                <div class="h-2 w-1/2 rounded-full bg-indigo-400"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="about" class="reveal mt-32">
                    <div class="text-center">
                        <p class="text-xs font-bold uppercase tracking-[0.3em] text-[#4A8CFF]">Keunggulan</p>
                        <h2 class="mt-2 text-3xl font-extrabold text-slate-900 sm:text-4xl">Kenapa memilih HUBH.id?</h2>
                    </div>
                    
                    <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                        @php
                            $features = [
                                ['title' => 'Siap Pakai', 'desc' => 'Tidak perlu koding. Beli, instal, langsung beroperasi hari ini juga.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />'],
                                ['title' => 'Hemat Biaya', 'desc' => 'Jauh lebih murah dibandingkan develop aplikasi custom dari nol.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'],
                                ['title' => 'Aman Terpercaya', 'desc' => 'Semua aplikasi melewati tahap verifikasi ketat oleh tim ahli.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />'],
                                ['title' => 'Kustomisasi', 'desc' => 'Tersedia opsi penyesuaian fitur khusus untuk bisnis Anda.', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z" />'],
                            ];
                        @endphp
                        
                        @foreach ($features as $index => $feature)
                            <div class="reveal delay-{{ ($index + 1) * 100 }} group relative overflow-hidden rounded-3xl bg-white p-8 ring-1 ring-slate-100 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#4A8CFF]/10">
                                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-blue-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                                <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-50 text-[#4A8CFF] ring-1 ring-slate-100 transition-all duration-300 group-hover:bg-[#4A8CFF] group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">{!! $feature['icon'] !!}</svg>
                                </div>
                                <h3 class="mt-6 text-xl font-bold text-slate-900">{{ $feature['title'] }}</h3>
                                <p class="mt-3 text-sm leading-relaxed text-slate-500">{{ $feature['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section id="products" class="reveal mt-32">
                    <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.3em] text-[#4A8CFF]">Katalog Top</p>
                            <h2 class="mt-2 text-3xl font-extrabold text-slate-900 sm:text-4xl">Aplikasi Populer</h2>
                        </div>
                        <a href="#" class="group flex items-center gap-2 text-sm font-semibold text-[#4A8CFF] transition-colors hover:text-[#2a6fd9]">
                            Lihat Semua 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                    
                    <div class="mt-10 grid gap-8 lg:grid-cols-3">
                        @php
                            $apps = [
                                ['name' => 'POS & Kasir', 'slug' => 'pos-kasir', 'tag' => 'Retail', 'desc' => 'Sistem transaksi cepat, manajemen stok, dan laporan harian otomatis.', 'price' => 'Rp 200.000', 'rating' => '4.9', 'bg' => 'from-blue-500 to-cyan-500'],
                                ['name' => 'Cafe Order', 'slug' => 'cafe-order', 'tag' => 'F&B', 'desc' => 'Atur pesanan pelanggan, manajemen meja, dan cetak struk dapur ringkas.', 'price' => 'Rp 350.000', 'rating' => '4.8', 'bg' => 'from-indigo-500 to-purple-500'],
                                ['name' => 'Laundry Manager', 'slug' => 'laundry-manager', 'tag' => 'Service', 'desc' => 'Pantau status cucian, notifikasi WhatsApp otomatis, dan kelola parfum.', 'price' => 'Rp 230.000', 'rating' => '4.7', 'bg' => 'from-emerald-500 to-teal-500'],
                            ];
                        @endphp

                        @foreach ($apps as $index => $app)
                            <article class="reveal delay-{{ ($index + 1) * 100 }} group flex flex-col overflow-hidden rounded-[2rem] bg-white ring-1 ring-slate-100 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-slate-200/50">
                                <div class="relative h-48 bg-gradient-to-br {{ $app['bg'] }} p-6">
                                    <div class="absolute inset-0 bg-black/10 opacity-0 transition-opacity group-hover:opacity-100"></div>
                                    <div class="relative flex h-full flex-col justify-between">
                                        <div class="flex items-start justify-between">
                                            <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-semibold text-white backdrop-blur-md">{{ $app['tag'] }}</span>
                                            <span class="flex items-center gap-1 rounded-full bg-white px-2.5 py-1 text-xs font-bold text-slate-900 shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                                {{ $app['rating'] }}
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-white drop-shadow-md">{{ $app['name'] }}</h3>
                                    </div>
                                </div>
                                <div class="flex flex-1 flex-col justify-between p-6">
                                    <p class="text-sm leading-relaxed text-slate-500">{{ $app['desc'] }}</p>
                                    <div class="mt-6 flex items-end justify-between border-t border-slate-100 pt-6">
                                        <div>
                                            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Mulai dari</p>
                                            <p class="text-lg font-extrabold text-slate-900">{{ $app['price'] }}</p>
                                        </div>
                                        <a href="{{ route('products.show', $app['slug']) }}" class="rounded-full bg-slate-50 px-4 py-2 text-sm font-semibold text-[#4A8CFF] transition-colors group-hover:bg-[#4A8CFF] group-hover:text-white">Detail</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="reveal mt-32 rounded-[3rem] bg-slate-900 px-6 py-20 lg:px-20 lg:py-24">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">4 Langkah Memulai</h2>
                        <p class="mt-4 text-slate-400">Proses sederhana untuk mendigitalkan bisnis Anda hari ini.</p>
                    </div>
                    
                    <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4 relative">
                        <div class="absolute top-1/2 left-0 hidden h-0.5 w-full -translate-y-1/2 bg-slate-800 lg:block"></div>
                        
                        @php
                            $steps = ['Pilih Aplikasi', 'Pembelian', 'Instalasi', 'Mulai Bisnis'];
                        @endphp
                        @foreach ($steps as $index => $step)
                            <div class="relative text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-800 text-xl font-black text-white shadow-xl ring-4 ring-slate-900 transition-transform hover:scale-110">
                                    0{{ $index + 1 }}
                                </div>
                                <h3 class="mt-6 font-bold text-white">{{ $step }}</h3>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="reveal mt-32 text-center">
                    <div class="mx-auto max-w-3xl rounded-[3rem] bg-gradient-to-b from-[#4A8CFF] to-[#2a6fd9] px-6 py-20 text-white shadow-2xl shadow-[#4A8CFF]/40 sm:py-24 lg:px-8">
                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-5xl">Siap Scale Up Bisnismu?</h2>
                        <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-blue-100">
                            Tinggalkan cara lama. Gunakan aplikasi profesional kami untuk mencatat transaksi, memantau stok, dan menganalisa keuntungan dengan mudah.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#products" class="rounded-full bg-white px-8 py-4 text-sm font-bold text-[#4A8CFF] shadow-lg transition-all hover:scale-105 hover:bg-slate-50">Eksplor Sekarang</a>
                        </div>
                    </div>
                </section>
            </main>

            <footer id="contact" class="mt-20 border-t border-slate-200 bg-white px-6 py-12 lg:px-8">
                <div class="mx-auto max-w-7xl">
                    <div class="grid gap-12 lg:grid-cols-[1.5fr_2fr]">
                        <div>
                            <span class="text-2xl font-black tracking-tight text-slate-900">HUBH.id</span>
                            <p class="mt-4 max-w-xs text-sm leading-relaxed text-slate-500">Marketplace aplikasi bisnis modern yang siap mendigitalkan operasional harian Anda secara cepat dan efisien.</p>
                        </div>
                        <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Platform</h3>
                                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                                    <li><a href="#products" class="hover:text-[#4A8CFF]">Katalog Aplikasi</a></li>
                                    <li><a href="#categories" class="hover:text-[#4A8CFF]">Kategori Bisnis</a></li>
                                    <li><a href="#pricing" class="hover:text-[#4A8CFF]">Harga</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Bantuan</h3>
                                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                                    <li><a href="#" class="hover:text-[#4A8CFF]">Pusat Bantuan</a></li>
                                    <li><a href="#" class="hover:text-[#4A8CFF]">Syarat & Ketentuan</a></li>
                                    <li><a href="#" class="hover:text-[#4A8CFF]">Kebijakan Privasi</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Kontak</h3>
                                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                                    <li>hello@hubh.id</li>
                                    <li>+62 812 3456 7890</li>
                                    <li class="pt-2"><a href="{{ route('admin.login') }}" class="font-semibold text-slate-900 hover:text-[#4A8CFF]">Admin Login &rarr;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 flex items-center justify-between border-t border-slate-100 pt-8 text-xs text-slate-400">
                        <p>&copy; {{ date('Y') }} HUBH.id. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Navbar Glassmorphism on Scroll
                const navbar = document.getElementById('navbar');
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 20) {
                        navbar.classList.add('bg-white/80', 'backdrop-blur-md', 'shadow-sm');
                        navbar.classList.remove('bg-white/0');
                    } else {
                        navbar.classList.add('bg-white/0');
                        navbar.classList.remove('bg-white/80', 'backdrop-blur-md', 'shadow-sm');
                    }
                });

                // Scroll Reveal Animation Setup
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.15
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            observer.unobserve(entry.target); // Trigger once
                        }
                    });
                }, observerOptions);

                const revealElements = document.querySelectorAll('.reveal');
                revealElements.forEach(el => observer.observe(el));
            });
        </script>
    </body>
</html>