<?php

namespace App\Interfaces\Repositories;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Collection;

interface FakultasRepositoryInterface
{
   public function all(): Collection;
   public function byId(int $id): ?Fakultas;
   public function create(array $input): Fakultas;
   public function update(array $input, int $id): Fakultas;
   public function destroy(int $id);
}
