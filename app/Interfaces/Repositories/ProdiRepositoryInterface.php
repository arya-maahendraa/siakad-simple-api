<?php

namespace App\Interfaces\Repositories;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Collection;

interface ProdiRepositoryInterface
{
   public function all(?int $jurusan = null): Collection;
   public function byId(int $id): ?Prodi;
   public function create(array $input): Prodi;
   public function update(array $input, int $id): Prodi;
   public function destroy(int $id);
}
