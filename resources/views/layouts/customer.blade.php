<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUBH.id Customer Portal</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900">
    <div class="min-h-screen">
        <nav class="border-b border-slate-200 px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="HUBH Logo" class="h-6 w-auto">
                <span class="font-semibold">HUBH.id Customer</span>
            </div>
            @auth('customer')
                <form method="POST" action="{{ route('dashboard.logout') }}">
                    @csrf
                    <button type="submit" class="text-sm">Logout</button>
                </form>
            @endauth
        </nav>
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
