<?php

namespace App\Http\Resources\Dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
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
            'jurusan' => $this->jurusan_id,
            'nip' => $this->nip,
            'nidn' => $this->nidn,
            'nidk' => $this->nidk,
            'nup' => $this->nup,
            'pns' => $this->pns,
            'golongan' => $this->golongan,
            'fungsional' => $this->fungsional
        ];
    }
}
