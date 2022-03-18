<?php

namespace App\Services\User;

use Illuminate\Support\Arr;

trait SplitUserData
{
   protected function splitCreateData(array $input)
   {
      return Arr::only($input,  [
         'name',
         'email',
         'jenisKelamin',
         'alamat',
         'password'
      ]);
   }

   protected function splitUpdateData(array $input)
   {
      return Arr::only($input,  [
         'name',
         'email',
         'jenisKelamin',
         'alamat',
      ]);
   }
}
