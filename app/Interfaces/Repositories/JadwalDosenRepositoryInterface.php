<?php 

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface JadwalDosenRepositoryInterface
{
   public function all(int $dosen):Collection;
   public function create(int $dosen, int $jadwal);
   public function remove(int $dosen, int $jadwal);
}