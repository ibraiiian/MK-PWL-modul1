<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Profile Card -->
                        <div class="w-full md:w-1/3">
                            <div class="bg-blue-50 rounded-2xl p-6 text-center border border-blue-100">
                                <div
                                    class="h-24 w-24 mx-auto bg-blue-600 rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4 shadow-lg">
                                    {{ substr($mahasiswa->nama, 0, 1) }}
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $mahasiswa->nama }}</h3>
                                <p class="text-blue-600 font-medium mb-4">{{ $mahasiswa->nim }}</p>
                                <div
                                    class="inline-block bg-white px-4 py-1 rounded-full text-sm font-semibold text-gray-600 shadow-sm border border-gray-200">
                                    Kelas {{ $mahasiswa->kelas }}
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="w-full md:w-2/3">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Informasi Akademik</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Mata Kuliah</p>
                                    <p class="text-gray-900 font-medium text-lg">{{ $mahasiswa->matakuliah->nama }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Dosen Pengampu</p>
                                    <p class="text-gray-900 font-medium text-lg">{{ $mahasiswa->matakuliah->dosen }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Kode MK</p>
                                    <p class="text-gray-900 font-medium bg-gray-100 inline-block px-2 py-1 rounded">
                                        {{ $mahasiswa->matakuliah->kode }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">SKS</p>
                                    <p class="text-gray-900 font-medium">{{ $mahasiswa->matakuliah->sks }} SKS</p>
                                </div>
                                <div class="col-span-1 md:col-span-2 mt-4">
                                    <p class="text-sm text-gray-500 mb-1">Diinput Oleh</p>
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                            {{ substr($mahasiswa->user->name ?? '?', 0, 1) }}
                                        </div>
                                        <p class="text-gray-700 font-medium">
                                            {{ $mahasiswa->user->name ?? 'Tidak diketahui' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 flex gap-3">
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none transition">
                                    Edit Data
                                </a>
                                <a href="{{ route('mahasiswa.index') }}"
                                    class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
