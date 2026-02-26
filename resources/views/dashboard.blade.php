<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-8 p-8 flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
                <div class="absolute right-0 top-0 h-full w-1/3 bg-blue-50/50 rounded-l-full transform translate-x-1/2"></div>
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat datang, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-gray-500 text-lg">Siap untuk mengelola data akademik hari ini?</p>
                </div>
                <div class="mt-6 md:mt-0 flex gap-3 relative z-10">
                    <a href="{{ route('mahasiswa.create') }}"
                        class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition shadow-sm flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Mahasiswa
                    </a>
                    <a href="{{ route('mata-kuliah.create') }}"
                        class="bg-white text-gray-700 border border-gray-200 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        Tambah MK
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Total Mahasiswa Card -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-400 bg-gray-50 px-2.5 py-1 rounded-lg">Aktif</span>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-gray-500 text-sm font-medium mb-1">Total Mahasiswa</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-bold text-gray-900">{{ $totalMahasiswa }}</span>
                            <span class="text-sm text-green-500 font-medium">mahasiswa</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-50">
                        <a href="{{ route('mahasiswa.index') }}"
                            class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center justify-between group">
                            Lihat semua mahasiswa
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>

                <!-- Total Mata Kuliah Card -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span
                            class="text-sm font-medium text-gray-400 bg-gray-50 px-2.5 py-1 rounded-lg">Kurikulum</span>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-gray-500 text-sm font-medium mb-1">Total Mata Kuliah</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-bold text-gray-900">{{ $totalMataKuliah }}</span>
                            <span class="text-sm text-indigo-500 font-medium">courses</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-50">
                        <a href="{{ route('mata-kuliah.index') }}"
                            class="text-indigo-600 hover:text-indigo-700 text-sm font-medium flex items-center justify-between group">
                            Lihat kurikulum
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Info/Footer -->
            <div class="text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} Sistem Informasi Akademik • Laravel 12
            </div>
        </div>
    </div>
</x-app-layout>
