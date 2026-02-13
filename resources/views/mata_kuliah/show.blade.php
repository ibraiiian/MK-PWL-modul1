<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Card -->
            <div
                class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl mb-8 p-8 text-white relative overflow-hidden">
                <div class="absolute right-0 top-0 h-full w-1/2 bg-white/10 transform skew-x-12 translate-x-12"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-2">
                        <span
                            class="bg-white/20 text-indigo-50 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase">{{ $mk->kode }}</span>
                        <span
                            class="bg-white/20 text-indigo-50 px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase">{{ $mk->sks }}
                            SKS</span>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">{{ $mk->nama }}</h1>
                    <p class="text-indigo-100 text-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Dosen: {{ $mk->dosen }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Main Content: Student List -->
                <div class="md:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3
                                class="text-lg font-bold text-gray-800 mb-4 border-b pb-2 flex items-center justify-between">
                                Mahasiswa Terdaftar
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $mk->mahasiswas->count() }}
                                    Orang</span>
                            </h3>

                            @if ($mk->mahasiswas->count() > 0)
                                <div class="grid grid-cols-1 gap-4">
                                    @foreach ($mk->mahasiswas as $mhs)
                                        <div
                                            class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-indigo-50 transition border border-gray-100">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold">
                                                    {{ substr($mhs->nama, 0, 1) }}
                                                </div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-900">{{ $mhs->nama }}</h4>
                                                    <p class="text-sm text-gray-500">{{ $mhs->nim }} • Kelas
                                                        {{ $mhs->kelas }}</p>
                                                </div>
                                            </div>
                                            <a href="{{ route('mahasiswa.show', $mhs->nim) }}"
                                                class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Lihat
                                                Profil &rarr;</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8 text-gray-500">
                                    <p>Belum ada mahasiswa yang mengambil mata kuliah ini.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar: Actions & Summary -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Aksi Cepat
                            </h3>
                            <div class="flex flex-col gap-3">
                                <a href="{{ route('mata-kuliah.edit', $mk->id) }}"
                                    class="w-full justify-center inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Edit Mata Kuliah
                                </a>
                                <form action="{{ route('mata-kuliah.destroy', $mk->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus mata kuliah ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full justify-center inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Hapus Mata Kuliah
                                    </button>
                                </form>
                                <a href="{{ route('mata-kuliah.index') }}"
                                    class="w-full justify-center inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
