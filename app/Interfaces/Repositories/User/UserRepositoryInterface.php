<?php

namespace App\Interfaces\Repositories\User;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

   public function setRole(RoleEnum $role);
   public function all(): Collection;
   public function byId(int $id): ?User;
   public function create(array $input): User;
   public function update(array $input, int $id): User;
   public function destroy(int $id);
}
