@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    
    <!-- Dashboard Header Card -->
    <div class="relative overflow-hidden bg-gradient-to-r from-[#134068] to-[#3594a4] rounded-2xl shadow-lg p-8 sm:p-10">
        
        <!-- Decorative Background Elements (Menggunakan warna light blue & slate dari palet) -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-[#cbe3ee] rounded-full mix-blend-overlay filter blur-3xl opacity-30 transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#7a9eb1] rounded-full mix-blend-overlay filter blur-3xl opacity-30 transform -translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">Admin Dashboard</h1>
                <p class="mt-2 text-[#cbe3ee] max-w-xl text-sm sm:text-base leading-relaxed">
                    Panel internal HUBH.id untuk mengelola aplikasi mobile dan order harian.
                </p>
            </div>
            
            <!-- Optional Action Button (Menggunakan warna putih/off-white dari palet) -->
            <div>
                <button class="px-5 py-2.5 bg-[#f4fbfb] text-[#134068] font-semibold text-sm rounded-xl shadow-sm hover:bg-white hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#cbe3ee] focus:ring-offset-2 focus:ring-offset-[#3594a4]">
                    + Buat Order Baru
                </button>
            </div>
        </div>
    </div>

    <!-- Contoh Implementasi Stats Cards yang senada -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="bg-white rounded-xl p-6 border-t-4 border-[#3594a4] shadow-sm flex flex-col justify-center hover:shadow-md transition-shadow">
            <p class="text-sm font-medium text-[#7a9eb1]">Total Orders</p>
            <p class="text-3xl font-bold text-[#134068] mt-2">124</p>
        </div>
        <div class="bg-white rounded-xl p-6 border-t-4 border-[#134068] shadow-sm flex flex-col justify-center hover:shadow-md transition-shadow">
            <p class="text-sm font-medium text-[#7a9eb1]">Active Users</p>
            <p class="text-3xl font-bold text-[#134068] mt-2">45</p>
        </div>
        <div class="bg-white rounded-xl p-6 border-t-4 border-[#7a9eb1] shadow-sm flex flex-col justify-center hover:shadow-md transition-shadow">
            <p class="text-sm font-medium text-[#7a9eb1]">System Status</p>
            <div class="flex items-center gap-2 mt-2">
                <span class="w-3 h-3 rounded-full bg-[#3594a4] animate-pulse"></span>
                <p class="text-xl font-bold text-[#3594a4]">Online</p>
            </div>
        </div>
    </div>

</div>
@endsection