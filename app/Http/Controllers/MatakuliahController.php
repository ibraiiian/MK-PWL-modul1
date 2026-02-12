<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        // 1. Membuat data mata kuliah (array)
        $mataKuliah = [
            [
                'kode' => 'MK001',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
                'dosen' => 'Pak. Rudi'
            ],
            [
                'kode' => 'MK002',
                'nama' => 'Basis Data',
                'sks' => 3,
                'dosen' => 'Pak. Nana'
            ],
            [
                'kode' => 'MK003',
                'nama' => 'Jaringan Komputer',
                'sks' => 2,
                'dosen' => 'Pak. Martanto'
            ],
        ];

        // 2. Mengirim data ke view
        return view('mata_kuliah', compact('mataKuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode',
            'nama' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'dosen' => 'required'
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $kode)
    {
        $request->validate([
            'nama' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'dosen' => 'required'
        ]);

        $matakuliah = MataKuliah::findOrFail($kode);
        $matakuliah->update($request->all());

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data berhasil diperbarui');
    }
}
