<?php

namespace App\Services\User;

use App\Enums\RoleEnum;
use App\Interfaces\Repositories\User\UserRepositoryInterface as UserRepository;
use App\Interfaces\Repositories\User\DosenRepositoryInterface as DosenRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DosenCUService
{
   use SplitUserData;

   protected $userRepository;
   protected $dosenRepository;

   public function __construct(
      UserRepository $userRepository,
      DosenRepository $dosenRepository
   ) {
      $this->userRepository = $userRepository;
      $this->userRepository->setRole(RoleEnum::Dosen);

      $this->dosenRepository = $dosenRepository;
   }

   public function splitDosenData(array $input): array
   {
      return Arr::only($input, [
         'jurusanId', 'nip', 'nidn', 'nidk', 'nup', 'pns', 'golongan', 'fungsional'
      ]);
   }

   public function create(array $input)
   {
      $userInput = $this->splitCreateData($input);
      $dosenInput = $this->splitDosenData($input);

      DB::beginTransaction();
      try {
         $user = $this->userRepository->create($userInput);
         $dosen = $this->dosenRepository->create($dosenInput, $user->id);
         DB::commit();
         return $dosen;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }

   public function update(array $input, int $id)
   {
      $userInput = $this->splitUpdateData($input);
      $dosenInput = $this->splitDosenData($input);

      DB::beginTransaction();
      try {
         $dosen = $this->dosenRepository->update($dosenInput, $id);
         $this->userRepository->update($userInput, $dosen->user_id);
         DB::commit();
         return $dosen;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }
}
