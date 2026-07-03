<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUBH.id Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-100 text-slate-900">
    <div class="min-h-screen lg:flex">
        <aside class="w-full bg-slate-950 text-slate-200 lg:w-72 lg:min-h-screen">
            <div class="border-b border-slate-800 px-6 py-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="HUBH Logo" class="h-8 w-auto">
                    <div>
                        <h2 class="text-xl font-semibold">HUBH.id</h2>
                        <p class="text-xs text-slate-400">Admin Panel</p>
                    </div>
                </div>
            </div>
            <nav class="space-y-1 px-3 py-4">
                @php($menu = [
                    ['label' => 'Dashboard', 'route' => route('admin.dashboard'), 'active' => request()->routeIs('admin.dashboard')],
                    ['label' => 'Produk', 'route' => route('admin.products.index'), 'active' => request()->routeIs('admin.products.*')],
                    ['label' => 'Client', 'route' => route('admin.clients.index'), 'active' => request()->routeIs('admin.clients.*')],
                    ['label' => 'Lisensi', 'route' => route('admin.licenses.index'), 'active' => request()->routeIs('admin.licenses.*')],
                    ['label' => 'Keuangan', 'route' => route('admin.placeholder', ['section' => 'keuangan']), 'active' => request()->routeIs('admin.placeholder') && request('section') === 'keuangan'],
                    ['label' => 'Lead', 'route' => route('admin.placeholder', ['section' => 'lead']), 'active' => request()->routeIs('admin.placeholder') && request('section') === 'lead'],
                    ['label' => 'Support', 'route' => route('admin.placeholder', ['section' => 'support']), 'active' => request()->routeIs('admin.placeholder') && request('section') === 'support'],
                    ['label' => 'Pengaturan', 'route' => route('admin.placeholder', ['section' => 'pengaturan']), 'active' => request()->routeIs('admin.placeholder') && request('section') === 'pengaturan'],
                ])
                @foreach($menu as $item)
                    <a href="{{ $item['route'] }}" class="flex items-center rounded-xl px-3 py-2 text-sm font-medium {{ isset($item['active']) && $item['active'] ? 'bg-sky-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="flex-1">
            <header class="border-b border-slate-200 bg-white px-4 py-4 shadow-sm sm:px-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Overview Dashboard</p>
                        <h1 class="text-xl font-semibold">Admin Panel HUBH.id</h1>
                    </div>
                    @auth('admin')
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700">Logout</button>
                        </form>
                    @endauth
                </div>
            </header>

            <main class="p-4 sm:p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
