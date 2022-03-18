<?php

namespace App\Interfaces\Repositories;

use App\Models\Jadwal;

interface EnrollJadwalRepositoryInterface
{
   public function enroll(int $jadwal, int $mahasiswa);
   public function remove(int $jadwal, int $mahasiswa);
   public function nilai(int $jadwal, int $mahasiswa, string $nilai);
}
