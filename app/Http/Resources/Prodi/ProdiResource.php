<?php

namespace App\Http\Resources\Prodi;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdiResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "jenjang" => $this->jenjang,
            "jurusan" => $this->jurusan->name,
            "fakultas" => $this->jurusan->fakultas->name
        ];
    }
}
