<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FakultasRepositoryInterface;
use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FakultasRepository implements FakultasRepositoryInterface
{
   public function all(): Collection
   {
      return Fakultas::all();
   }

   public function byId(int $id): ?Fakultas
   {
      $fakultas = Fakultas::find($id);
      if (!$fakultas) throw new NotFoundHttpException('Fakultas not found.');
      return $fakultas;
   }

   public function create(array $data): Fakultas
   {
      $fakultas = new Fakultas;
      $fakultas->name = $data['name'];
      $fakultas->save();
      return $fakultas->fresh();
   }

   public function update(array $data, int $id): Fakultas
   {
      $fakultas = Fakultas::find($id);
      if (!$fakultas) throw new NotFoundHttpException('Fakultas not found.');
      $fakultas->name = $data['name'];
      $fakultas->save();
      return $fakultas->fresh();
   }

   public function destroy(int $id)
   {
      $fakultas = Fakultas::find($id);
      if (!$fakultas) throw new NotFoundHttpException('Fakultas not found.');
      $fakultas->delete();
   }
}
