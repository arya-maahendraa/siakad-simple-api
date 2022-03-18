<?php

namespace App\Interfaces\Repositories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Collection;

interface JadwalRepositoryInterface
{
   public function all(?int $prodi = null): Collection;
   public function byId(int $id): ?Jadwal;
   public function create(array $input): Jadwal;
   public function update(array $input, int $id): Jadwal;
   public function destroy(int $id);
}
