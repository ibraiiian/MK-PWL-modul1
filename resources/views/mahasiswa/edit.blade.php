<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- NIM -->
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                            <div class="mt-1">
                                <input type="text" name="nim" id="nim"
                                    class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('nim') border-red-300 @enderror"
                                    value="{{ old('nim', $mahasiswa->nim) }}" required>
                            </div>
                            @error('nim')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <div class="mt-1">
                                <input type="text" name="nama" id="nama"
                                    class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('nama') border-red-300 @enderror"
                                    value="{{ old('nama', $mahasiswa->nama) }}" required>
                            </div>
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <div class="mt-1">
                                <input type="text" name="kelas" id="kelas"
                                    class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('kelas') border-red-300 @enderror"
                                    value="{{ old('kelas', $mahasiswa->kelas) }}" required>
                            </div>
                            @error('kelas')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mata Kuliah -->
                        <div>
                            <label for="matakuliah_id" class="block text-sm font-medium text-gray-700">Mata
                                Kuliah</label>
                            <div class="mt-1">
                                <select id="matakuliah_id" name="matakuliah_id"
                                    class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('matakuliah_id') border-red-300 @enderror"
                                    required>
                                    <option value="">-- Pilih Mata Kuliah --</option>
                                    @foreach ($data_mk as $mk)
                                        <option value="{{ $mk->id }}"
                                            {{ old('matakuliah_id', $mahasiswa->matakuliah_id) == $mk->id ? 'selected' : '' }}>
                                            {{ $mk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('matakuliah_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('mahasiswa.index') }}"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
