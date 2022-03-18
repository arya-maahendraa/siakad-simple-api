<?php

namespace App\Interfaces\Repositories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Collection;

interface MataKuliahRepositoryInterface
{
   public function all(?int $prodi = null): Collection;
   public function getListOf(array $list):Collection;
   public function byId(int $id): ?MataKuliah;
   public function create(array $input): MataKuliah;
   public function update(array $input, int $id): MataKuliah;
   public function destroy(int $id);
}
