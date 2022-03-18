<?php

namespace App\Repositories\User;

use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserRepository implements UserRepositoryInterface
{
   protected RoleEnum $role;
   public function setRole(RoleEnum $role)
   {
      $this->role = $role;
   }

   public function all(): Collection
   {
      return User::where('role_id', $this->role)->get();
   }

   public function byId(int $id): ?User
   {
      $user = User::where('role_id', $this->role)
         ->where('id', $id)->first();
      if (!$user) throw new NotFoundHttpException('User not found.');
      return $user;
   }

   public function create(array $input): User
   {
      $user = new User;
      $user->name = $input['name'];
      $user->email = $input['email'];
      $user->jenis_kelamin = $input['jenisKelamin'];
      $user->alamat = $input['alamat'];
      $user->profile = $input['profile'] ?? '';
      $user->password = Hash::make($input['password']);
      $user->role_id = $this->role;
      $user->save();
      return $user->fresh();
   }

   public function update(array $input, int $id): User
   {
      $user = User::where('role_id', $this->role)
         ->where('id', $id)->first();
      if (!$user) throw new NotFoundHttpException('User not found.');

      $user->name = $input['name'];
      $user->email = $input['email'];
      $user->jenis_kelamin = $input['jenisKelamin'];
      $user->alamat = $input['alamat'];
      $user->profile = $input['profile'] ?? '';
      $user->save();
      return $user->fresh();
   }

   public function destroy(int $id)
   {
      User::where('role_id', $this->role)
         ->where('id', $id)->firstOrFail()->delete();
   }
}
