<?php

namespace App\Repositories;

use App\Interfaces\Repositories\EnrollJadwalRepositoryInterface;
use App\Models\JadwalMahasiswa;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnrollJadwalRepository implements EnrollJadwalRepositoryInterface
{
   public function enroll(int $jadwal, int $mahasiswa)
   {
      if ($this->isExist($jadwal, $mahasiswa)) return;

      $mahasiswaMatkul = new JadwalMahasiswa;
      $mahasiswaMatkul->mahasiswa_id = $mahasiswa;
      $mahasiswaMatkul->jadwal_id = $jadwal;
      $mahasiswaMatkul->save();
   }

   protected function isExist(int $jadwal, int $mahasiswa): bool
   {
      $count = JadwalMahasiswa::where('jadwal_id', $jadwal)
         ->where('mahasiswa_id', $mahasiswa)->count();
      return $count > 0;
   }

   protected function getJadwalMahasiswa(int $jadwal, int $mahasiswa): JadwalMahasiswa
   {
      $jadwal = JadwalMahasiswa::where('jadwal_id', $jadwal)
         ->where('mahasiswa_id', $mahasiswa)->get();
      if ($jadwal->count() > 1)
         throw new \Exception('Terdapat 2 jadwal. Hubingi bambang!');
      if ($jadwal->count() < 1)
         throw new AccessDeniedHttpException('This action is unauthorized.');
      return $jadwal[0];
   }

   public function remove(int $jadwal, int $mahasiswa)
   {
      $jadwalMahasiswa = $this->getJadwalMahasiswa($jadwal, $mahasiswa);
      $jadwalMahasiswa->delete();
   }

   public function nilai(int $jadwal, int $mahasiswa, string $nilai)
   {
      $jadwalMahasiswa = $this->getJadwalMahasiswa($jadwal, $mahasiswa);
      $jadwalMahasiswa->nilai = $nilai;
      $jadwalMahasiswa->save();
   }
}
