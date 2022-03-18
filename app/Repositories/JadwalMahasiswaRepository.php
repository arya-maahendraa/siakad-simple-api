<?php

namespace App\Repositories;

use App\Interfaces\Repositories\JadwalMahasiswaRepositoryInterface;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Collection;

class JadwalMahasiswaRepository implements JadwalMahasiswaRepositoryInterface
{
   public function all(int $mahasiswa): Collection
   {
      return Jadwal::whereRelation('mahasiswa', 'mahasiswa.id', $mahasiswa)
         ->with('matakuliah')->get();
   }
}
