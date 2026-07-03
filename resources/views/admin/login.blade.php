@extends('layouts.admin')

@section('content')
<div class="max-w-md mx-auto mt-16 rounded-xl bg-white p-8 shadow">
    <h1 class="text-2xl font-semibold mb-6">Admin Login</h1>
    <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm mb-1">Email</label>
            <input name="email" type="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block text-sm mb-1">Password</label>
            <input name="password" type="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <button class="w-full bg-slate-900 text-white rounded px-3 py-2">Login</button>
    </form>
</div>
@endsection
