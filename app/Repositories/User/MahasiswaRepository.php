<?php

namespace App\Repositories\User;

use App\Interfaces\Repositories\User\MahasiswaRepositoryInterface;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MahasiswaRepository implements MahasiswaRepositoryInterface
{
   public function all(?int $dosne = null): Collection
   {
      return Mahasiswa::with('user')->when(
         $dosne,
         fn ($query, $dosen) => $query->where('dosen_id', $dosen)
      )->get();
   }

   public function byId(int $id, ?int $dosne = null): ?Mahasiswa
   {
      $mahasiswa = Mahasiswa::with('user')->when(
         $dosne,
         fn ($query, $dosen) => $query->where('dosen_id', $dosen)
      )->find($id);
      if (!$mahasiswa) return throw new NotFoundHttpException('Mahasiswa not found.');
      return $mahasiswa;
   }

   public function byNim(string $nim, ?int $dosne = null): ?Mahasiswa
   {
      $mahasiswa = Mahasiswa::with('user')->when(
         $dosne,
         fn ($query, $dosen) => $query->where('dosen_id', $dosen)
      )->where('nim', $nim)->first();
      if (!$mahasiswa) return throw new NotFoundHttpException('Mahasiswa not found.');
      return $mahasiswa;
   }

   public function create(array $input, int $user): Mahasiswa
   {
      $mahasiswa = new Mahasiswa;
      $mahasiswa->user_id = $user;
      $mahasiswa->nim = $input['nim'];
      $mahasiswa->no_ijaza = $input['noIjaza'];
      $mahasiswa->sekolah_asal = $input['sekolahAsal'];
      $mahasiswa->dosen_id = $input['dosenId'];
      $mahasiswa->prodi_id = $input['prodiId'];
      $mahasiswa->nama_ayah = $input['namaAyah'];
      $mahasiswa->nama_ibu = $input['namaIbu'];
      $mahasiswa->pekerjaan_ayah = $input['pekerjaanAyah'];
      $mahasiswa->pekerjaan_ibu = $input['pekerjaanIbu'];
      $mahasiswa->alamat_orangtua = $input['alamatOrangtua'];
      $mahasiswa->status_awal = $input['statusAwal'];
      $mahasiswa->status = $input['status'];

      $mahasiswa->save();
      return $this->byId($mahasiswa->id);
   }

   public function update(array $input, int $id): Mahasiswa
   {
      $mahasiswa = Mahasiswa::find($id);
      if (!$mahasiswa) return throw new NotFoundHttpException('Mahasiswa not found.');

      $mahasiswa->nim = $input['nim'];
      $mahasiswa->no_ijaza = $input['noIjaza'];
      $mahasiswa->sekolah_asal = $input['sekolahAsal'];
      $mahasiswa->dosen_id = $input['dosenId'];
      $mahasiswa->prodi_id = $input['prodiId'];
      $mahasiswa->nama_ayah = $input['namaAyah'];
      $mahasiswa->nama_ibu = $input['namaIbu'];
      $mahasiswa->pekerjaan_ayah = $input['pekerjaanAyah'];
      $mahasiswa->pekerjaan_ibu = $input['pekerjaanIbu'];
      $mahasiswa->alamat_orangtua = $input['alamatOrangtua'];
      $mahasiswa->status_awal = $input['statusAwal'];
      $mahasiswa->status = $input['status'];

      $mahasiswa->save();
      return $this->byId($mahasiswa->id);
   }

   public function destroy(int $id)
   {
      // User::where('role_id', RoleEnum::Dosen)
      //    ->where('id', $id)->firstOrFail()->delete();
   }
}
