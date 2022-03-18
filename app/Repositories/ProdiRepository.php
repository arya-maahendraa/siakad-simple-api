<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProdiRepositoryInterface;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProdiRepository implements ProdiRepositoryInterface
{
   public function all(?int $jurusan = null): Collection
   {
      return Prodi::with('jurusan.fakultas')->when(
         $jurusan,
         fn ($query, $jurusan) => $query->where('jurusan_id', $jurusan)
      )->get();
   }

   public function byId(int $id): ?Prodi
   {
      $prodi = Prodi::with('jurusan.fakultas')->find($id);
      if (!$prodi) throw new NotFoundHttpException('Prodi not found.');
      return $prodi;
   }

   public function create(array $data): Prodi
   {
      $prodi = new Prodi;
      $prodi->name = $data['name'];
      $prodi->jenjang = $data['jenjang'];
      $prodi->jurusan_id = $data['jurusanId'];
      $prodi->save();
      return $prodi->fresh();
   }

   public function update(array $data, int $id): Prodi
   {
      $prodi = Prodi::find($id);
      if (!$prodi) throw new NotFoundHttpException('Prodi not found.');
      $prodi->name = $data['name'];
      $prodi->jenjang = $data['jenjang'];
      $prodi->jurusan_id = $data['jurusanId'];
      $prodi->save();
      return $prodi->fresh();
   }

   public function destroy(int $id)
   {
      $prodi = Prodi::find($id);
      if (!$prodi) throw new NotFoundHttpException('Prodi not found.');
      $prodi->delete();
   }
}
