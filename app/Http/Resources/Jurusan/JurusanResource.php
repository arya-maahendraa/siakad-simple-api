<?php

namespace App\Http\Resources\Jurusan;

use App\Http\Resources\Fakultas\FakultasResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JurusanResource extends JsonResource
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
            "fakultas" => new FakultasResource($this->fakultas)
        ];
    }
}
