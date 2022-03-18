<?php

namespace App\Services;

use App\Interfaces\Repositories\EnrollJadwalRepositoryInterface as Reposiotry;
use App\Interfaces\Repositories\JadwalRepositoryInterface as JadwalRepository;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnrollJadwalService
{
   protected $repository;
   public function __construct(Reposiotry $repository)
   {
      $this->repository = $repository;
   }

   public function enroll(array $listJadwalId, Mahasiswa $mahasiswa)
   {
      $jadwalReposiotry = app()->make(JadwalRepository::class);
      DB::beginTransaction();
      try {
         foreach ($listJadwalId as $jadwalId) {
            $jadwal = $jadwalReposiotry->byId($jadwalId);
            if ($mahasiswa->prodi_id !== $jadwal->matakuliah->prodi_id)
               throw new AccessDeniedHttpException('This action is unauthorized.');
            $this->repository->enroll($jadwal->id, $mahasiswa->id);
         }
         DB::commit();
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }
}
