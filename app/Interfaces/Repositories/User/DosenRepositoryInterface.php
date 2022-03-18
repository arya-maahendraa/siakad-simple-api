<?php

namespace App\Interfaces\Repositories\User;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Collection;

interface DosenRepositoryInterface
{
   public function all(): Collection;
   public function byId(int $id): ?Dosen;
   public function create(array $input, int $user): Dosen;
   public function update(array $input, int $id): Dosen;
   public function destroy(int $id);
}
