<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\RoleEnum;
use App\Interfaces\Repositories\User\DosenRepositoryInterface;
use App\Models\Dosen;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DosenRepository implements DosenRepositoryInterface
{
   public function all(): Collection
   {
      return Dosen::with('user')->get();
   }

   public function byId(int $id): ?Dosen
   {
      $dosen = Dosen::with('user')->where('id', $id)->first();
      if (!$dosen) throw new NotFoundHttpException('Dosen not found.');
      return $dosen;
   }

   public function create(array $input, int $user): Dosen
   {
      $dosen = new Dosen;
      $dosen->user_id = $user;
      $dosen->jurusan_id  = $input['jurusanId'];
      $dosen->nip  = $input['nip'];
      $dosen->nidn = $input['nidn'];
      $dosen->nidk = $input['nidk'];
      $dosen->nup = $input['nup'];
      $dosen->pns =  $input['pns'];
      $dosen->golongan =  $input['golongan'];
      $dosen->fungsional =  $input['fungsional'];
      $dosen->save();
      return $this->byId($dosen->id);
   }

   public function update(array $input, int $id): Dosen
   {
      $dosen = Dosen::find($id);
      if (!$dosen) throw new NotFoundHttpException('Dosen not found.');

      $dosen->jurusan_id  = $input['jurusanId'];
      $dosen->nip  = $input['nip'];
      $dosen->nidn = $input['nidn'];
      $dosen->nidk = $input['nidk'];
      $dosen->nup = $input['nup'];
      $dosen->pns =  $input['pns'];
      $dosen->golongan =  $input['golongan'];
      $dosen->fungsional =  $input['fungsional'];
      $dosen->save();
      return $this->byId($dosen->id);
   }

   public function destroy(int $id)
   {
      // User::where('role_id', RoleEnum::Dosen)
      //    ->where('id', $id)->firstOrFail()->delete();
   }
}
