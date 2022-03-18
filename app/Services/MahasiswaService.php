<?php

namespace App\Services;

use App\Models\Mahasiswa;

class MahasiswaService
{
   public static function getByNim(string $nim): Mahasiswa | null
   {
      return Mahasiswa::where('nim', $nim)->first();
   }
}
