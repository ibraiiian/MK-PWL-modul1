<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'dosen'
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'matakuliah_id');
    }
}

