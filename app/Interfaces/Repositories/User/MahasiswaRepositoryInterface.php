<?php

namespace App\Interfaces\Repositories\User;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;

interface MahasiswaRepositoryInterface
{
   public function all(?int $dosne = null): Collection;
   public function byId(int $id, ?int $dosne = null): ?Mahasiswa;
   public function byNim(string $nim, ?int $dosne = null): ?Mahasiswa;
   public function create(array $input, int $user): Mahasiswa;
   public function update(array $input, int $id): Mahasiswa;
   public function destroy(int $id);
}
