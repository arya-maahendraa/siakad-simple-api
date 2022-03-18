<?php

namespace App\Enums;

enum RoleEnum: int
{
   case Admin = 1;
   case Dosen = 2;
   case Mahasiswa = 3;

   public static function getRole(int $role): string
   {
      return match ($role) {
         RoleEnum::Admin->value => "admin",
         RoleEnum::Dosen->value => "dosen",
         RoleEnum::Mahasiswa->value => "mahasiswa",
      };
   }
}
