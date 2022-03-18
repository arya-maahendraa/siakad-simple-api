<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MataKuliahRepositoryInterface;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MataKuliahRepository implements MataKuliahRepositoryInterface
{
   public function all(?int $prodi = null): Collection
   {
      return MataKuliah::when(
         $prodi,
         fn ($query, $prodi) => $query->where('prodi_id', $prodi)
      )->get();
   }

   public function getListOf(array $list, ?array $select = null): Collection
   {
      return MataKuliah::whereIn('id', $list)->when(
         $select,
         fn ($query, $select) => $query->select(...$select)
      )->get();
   }


   public function byId(int $id): ?MataKuliah
   {
      $mk = MataKuliah::find($id);
      if (!$mk) throw new NotFoundHttpException('Mata Kuliah not found.');
      return $mk;
   }

   public function create(array $input): MataKuliah
   {
      $mk = new MataKuliah;
      $mk->name = $input['name'];
      $mk->kode = $input['kode'];
      $mk->sks = $input['sks'];
      $mk->prodi_id = $input['prodiId'];
      $mk->save();
      return $mk->fresh();
   }

   public function update(array $input, int $id): MataKuliah
   {
      $mk = MataKuliah::find($id);
      if (!$mk) throw new NotFoundHttpException('Mata Kuliah not found.');
      $mk->name = $input['name'];
      $mk->kode = $input['kode'];
      $mk->sks = $input['sks'];
      $mk->prodi_id = $input['prodiId'];
      $mk->save();
      return $mk->fresh();
   }

   public function destroy(int $id)
   {
      $mk = MataKuliah::find($id);
      if (!$mk) throw new NotFoundHttpException('Mata Kuliah not found.');
      $mk->delete();
   }
}
