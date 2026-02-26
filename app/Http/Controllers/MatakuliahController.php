<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::withCount('mahasiswas')->get();
        return view('mata_kuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        return view('mata_kuliah.create');
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
            ->with('success', 'Data mata kuliah berhasil ditambahkan');
    }

    public function show($id)
    {
        $mataKuliah = MataKuliah::with('mahasiswas')->findOrFail($id);
        return view('mata_kuliah.show', compact('mataKuliah'));
    }

    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        return view('mata_kuliah.edit', compact('mataKuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'dosen' => 'required'
        ]);

        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->update($request->all());

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus');
    }
}
