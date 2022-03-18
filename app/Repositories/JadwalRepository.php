<?php

namespace App\Repositories;

use App\Interfaces\Repositories\JadwalRepositoryInterface;
use App\Models\Jadwal;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JadwalRepository implements JadwalRepositoryInterface
{
   public function all(?int $prodi = null): Collection
   {
      return Jadwal::when(
         $prodi,
         fn ($query, $prodi) => $query->whereRelation('matakuliah', 'prodi_id', $prodi),
         fn ($query, $prodi) => $query->with('matakuliah')
      )->get();
   }

   public function byId(int $id): ?Jadwal
   {
      $jadwal = Jadwal::find($id);
      if (!$jadwal) throw new NotFoundHttpException('Jadwal not found.');
      return $jadwal;
   }

   public function create(array $data): Jadwal
   {
      $jadwal = new Jadwal;
      $jadwal->tahun_ajaran_id = $data['tahunAjaranId'];
      $jadwal->hari = $data['hari'];
      $jadwal->jam = $data['jam'];
      $jadwal->kelas = $data['kelas'];
      $jadwal->matkul_id = $data['matkulId'];
      $jadwal->save();
      return $jadwal->fresh();
   }

   public function update(array $data, int $id): Jadwal
   {
      $jadwal = $this->byId($id);
      $jadwal->tahun_ajaran_id = $data['tahunAjaranId'];
      $jadwal->hari = $data['hari'];
      $jadwal->jam = $data['jam'];
      $jadwal->kelas = $data['kelas'];
      $jadwal->matkul_id = $data['matkulId'];
      $jadwal->save();
      return $jadwal->fresh();
   }

   public function destroy(int $id)
   {
      $jadwal = $this->byId($id);
      $jadwal->delete();
   }
}
