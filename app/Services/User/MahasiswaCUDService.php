<?php

namespace App\Services\User;

use App\Enums\RoleEnum;
use App\Interfaces\Repositories\User\UserRepositoryInterface as UserRepository;
use App\Interfaces\Repositories\User\MahasiswaRepositoryInterface as MahasiswaReposiotry;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MahasiswaCUDService
{
   use SplitUserData;

   protected $userRepository;
   protected $mahasiswaRepository;

   public function __construct(
      UserRepository $userRepository,
      MahasiswaReposiotry $mahasiswaRepository
   ) {
      $this->userRepository = $userRepository;
      $this->userRepository->setRole(RoleEnum::Mahasiswa);

      $this->mahasiswaRepository = $mahasiswaRepository;
   }

   protected function splitMahasiswaInputData(array $input): array
   {
      return Arr::only($input, [
         'nim',
         'noIjaza',
         'sekolahAsal',
         'dosenId',
         'prodiId',
         'namaAyah',
         'namaIbu',
         'pekerjaanAyah',
         'pekerjaanIbu',
         'alamatOrangtua',
         'statusAwal',
         'status'
      ]);
   }

   public function create(array $input): Mahasiswa
   {
      $userInput = $this->splitCreateData($input);
      $mahasiswaInput = $this->splitMahasiswaInputData($input);

      DB::beginTransaction();
      try {
         $user = $this->userRepository->create($userInput);
         $mahasiswa = $this->mahasiswaRepository->create($mahasiswaInput, $user->id);
         DB::commit();
         return $mahasiswa;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }

   public function update(array $input, int $id)
   {
      $userInput = $this->splitUpdateData($input);
      $mahasiswaInput = $this->splitMahasiswaInputData($input);

      DB::beginTransaction();
      try {
         $mahasiswa = $this->mahasiswaRepository->update($mahasiswaInput, $id);
         $user = $this->userRepository->update($userInput, $mahasiswa->user->id);
         DB::commit();
         return $mahasiswa;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
      }
   }
}
