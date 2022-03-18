<?php

namespace App\Services\User;

use App\Models\Dosen;
use App\Models\Mahasiswa;

class GetUserRoleFromSession
{
   public static function getDosenId(): int
   {
      if (request()->session()->missing('_user._dosen'))
         throw new \Exception('Something broke!');
      return request()->session()->get('_user._dosen');
   }

   public static function getMahasiswaId(): int
   {
      if (request()->session()->missing('_user._mahasiswa'))
         throw new \Exception('Something broke!');
      return request()->session()->get('_user._mahasiswa');
   }

   public static function getDosen(): Dosen
   {
      $repository = app()->make(
         'App\Interfaces\Repositories\User\DosenRepositoryInterface'
      );

      $dosen = GetUserRoleFromSession::getDosenId();
      return $repository->byId($dosen);
   }

   public static function getMahasiswa(): Mahasiswa
   {
      $repository = app()->make(
         'App\Interfaces\Repositories\User\MahasiswaRepositoryInterface'
      );

      $mahasiswa = GetUserRoleFromSession::getMahasiswaId();
      return $repository->byId($mahasiswa);
   }
}
