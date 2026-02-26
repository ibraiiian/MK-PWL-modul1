<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('matakuliah')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_mk = MataKuliah::all();

        return view('mahasiswa.create', compact('data_mk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:mata_kuliahs,id',
        ]);

        Mahasiswa::create(array_merge($request->all(), [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $data_mk = MataKuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'data_mk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,'.$id.',nim',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:mata_kuliahs,id',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Cetak laporan mahasiswa sebagai PDF.
     */
    public function cetak_pdf()
    {
        $mahasiswa = Mahasiswa::with('matakuliah')->get();
        $pdf = Pdf::loadView('mahasiswa.laporan_pdf', compact('mahasiswa'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('laporan-mahasiswa.pdf');
    }
}
