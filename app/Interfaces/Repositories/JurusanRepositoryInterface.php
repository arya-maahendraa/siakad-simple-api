<?php

namespace App\Interfaces\Repositories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Collection;

interface JurusanRepositoryInterface
{
   public function all(): Collection;
   public function byId(int $id): ?Jurusan;
   public function create(array $input): Jurusan;
   public function update(array $input, int $id): Jurusan;
   public function destroy(int $id);
}
