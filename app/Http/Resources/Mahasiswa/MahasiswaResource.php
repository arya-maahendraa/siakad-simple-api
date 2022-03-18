<?php

namespace App\Http\Resources\Mahasiswa;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'jenisKelamin' => $this->user->jenis_kelamin,
            'alamat' => $this->user->alamat,
            'profile' => $this->user->profile,
            'nim' => $this->nim,
            'noIjaza' => $this->no_ijaza,
            'sekolahAsal' => $this->sekolah_asal,
            'dosen' => $this->dosen_id,
            'prodi' => $this->prodi_id,
            'namaAyah' => $this->nama_ayah,
            'namaIbu' => $this->nama_ibu,
            'pekerjaanAyah' => $this->pekerjaan_ayah,
            'pekerjaanIbu' => $this->pekerjaan_ibu,
            'alamatOrangtua' => $this->alamat_orangtua,
            'statusAwal' => $this->status_awal,
            'status' => $this->status,
        ];
    }
}
