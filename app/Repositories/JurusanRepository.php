<?php

namespace App\Repositories;

use App\Interfaces\Repositories\JurusanRepositoryInterface;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JurusanRepository implements JurusanRepositoryInterface
{
   public function all(): Collection
   {
      return Jurusan::with('fakultas')->get();
   }

   public function byId(int $id): ?Jurusan
   {
      $jurusan = Jurusan::with('fakultas')->find($id);
      if (!$jurusan) throw new NotFoundHttpException('Jurusan not found');
      return $jurusan;
   }

   public function create(array $data): Jurusan
   {
      $jurusan = new Jurusan;
      $jurusan->name = $data['name'];
      $jurusan->fakultas_id = $data['fakultasId'];
      $jurusan->save();
      return $jurusan->fresh();
   }

   public function update(array $data, int $id): Jurusan
   {
      $jurusan = Jurusan::find($id);
      if (!$jurusan) throw new NotFoundHttpException('Jurusan not found');
      $jurusan->name = $data['name'];
      $jurusan->fakultas_id = $data['fakultasId'];
      $jurusan->save();
      return $jurusan->fresh();
   }

   public function destroy(int $id)
   {
      $jurusan = Jurusan::find($id);
      if (!$jurusan) throw new NotFoundHttpException('Jurusan not found');
      $jurusan->delete();
   }
}
