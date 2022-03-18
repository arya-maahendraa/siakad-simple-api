<?php

namespace App\Http\Resources\MataKuliah;

use Illuminate\Http\Resources\Json\JsonResource;

class MataKuliahResource extends JsonResource
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
            'name' => $this->name,
            'kode' => $this->kode,
            'sks' => $this->sks,
            'prodi' => $this->prodi_id
        ];
    }
}
