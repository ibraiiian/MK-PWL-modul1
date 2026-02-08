<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
