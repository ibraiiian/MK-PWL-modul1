<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('mata-kuliah.store') }}" class="space-y-6">
                        @csrf

                        <!-- Kode MK -->
                        <div>
                            <label for="kode" class="block text-sm font-medium text-gray-700">Kode Mata
                                Kuliah</label>
                            <div class="mt-1">
                                <input type="text" name="kode" id="kode"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('kode') border-red-300 @enderror"
                                    value="{{ old('kode') }}" placeholder="Contoh: TIF1234">
                            </div>
                            @error('kode')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama MK -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mata
                                Kuliah</label>
                            <div class="mt-1">
                                <input type="text" name="nama" id="nama"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('nama') border-red-300 @enderror"
                                    value="{{ old('nama') }}" placeholder="Contoh: Algoritma Pemrograman">
                            </div>
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKS -->
                        <div>
                            <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                            <div class="mt-1">
                                <input type="number" name="sks" id="sks" min="1" max="6"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('sks') border-red-300 @enderror"
                                    value="{{ old('sks') }}" placeholder="Contoh: 3">
                            </div>
                            @error('sks')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dosen -->
                        <div>
                            <label for="dosen" class="block text-sm font-medium text-gray-700">Nama Dosen</label>
                            <div class="mt-1">
                                <input type="text" name="dosen" id="dosen"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('dosen') border-red-300 @enderror"
                                    value="{{ old('dosen') }}" placeholder="Masukkan nama dosen pengampu">
                            </div>
                            @error('dosen')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('mata-kuliah.index') }}"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Simpan Mata Kuliah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
