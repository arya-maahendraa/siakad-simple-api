<?php

namespace App\Http\Resources\Jadwal;

use App\Http\Resources\Dosen\DosenCollection;
use App\Http\Resources\Dosen\DosenResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
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
            'tahunAjaran' => $this->tahun_ajaran_id,
            'hari' => $this->hari,
            'jam' => $this->jam,
            'kelas' => $this->kelas,
            'matkul' => $this->matakuliah->name,
            'sks' => $this->matakuliah->sks,
            $this->mergeWhen(!$request->user()->isDosen(), [
                'dosen' => $this->when($this->dosen, DosenResource::collection($this->dosen))
            ])
        ];
    }
}
