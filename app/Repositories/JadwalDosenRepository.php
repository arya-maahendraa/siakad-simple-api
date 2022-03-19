<?php

namespace App\Repositories;

use App\Interfaces\Repositories\JadwalDosenRepositoryInterface;
use App\Models\Jadwal;
use App\Models\JadwalDosen;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class JadwalDosenRepository implements JadwalDosenRepositoryInterface
{
   public function all(int $dosen): Collection
   {
      return Jadwal::whereRelation('dosen', 'dosen.id', $dosen)->get();
   }

   public function create(int $dosen, int $jadwal)
   {
      $jadwalDosen = JadwalDosen::where('dosen_id', $dosen)
         ->where('jadwal_id', $jadwal)->first();
      if ($jadwalDosen) throw new AccessDeniedHttpException('This action is unauthorized.');
      $jadwalDosen = new JadwalDosen;
      $jadwalDosen->dosen_id = $dosen;
      $jadwalDosen->jadwal_id = $jadwal;
      $jadwalDosen->save();
   }

   public function remove(int $dosen, int $jadwal)
   {
      $jadwalDosen = JadwalDosen::where('dosen_id', $dosen)
         ->where('jadwal_id', $jadwal)->first();
      if (!$jadwalDosen) throw new AccessDeniedHttpException('This action is unauthorized.');
      $jadwalDosen->delete();
   }
}
