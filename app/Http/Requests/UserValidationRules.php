<?php

namespace App\Http\Requests;

use App\Enums\JenisKelaminEnum as JenisKelamin;
use Illuminate\Validation\Rules\Enum;
use Laravel\Fortify\Rules\Password;

trait UserValidationRules
{
   protected function getUserRules(string $method, ?int $id = null): array
   {
      return array_merge(
         [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id ?? '',
            'jenisKelamin' => ['required', 'string', new Enum(JenisKelamin::class)],
            'alamat' => 'required|string',
         ],
         ($method === 'POST' ? [
            'password' => ['required', 'string', new Password]
         ] : [])
      );
   }
}
