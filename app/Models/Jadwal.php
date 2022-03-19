<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id');
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(
            Mahasiswa::class,
            'jadwal_mahasiswa',
            'jadwal_id',
            'mahasiswa_id'
        );
    }

    public function dosen()
    {
        return $this->belongsToMany(
            Dosen::class,
            'jadwal_dosen',
            'jadwal_id',
            'dosen_id'
        );
    }
}
