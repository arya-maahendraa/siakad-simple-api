<?php 

namespace App\Interfaces\Repositories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;

interface JadwalMahasiswaRepositoryInterface
{
   public function all(int $mahasiswa):Collection;
}