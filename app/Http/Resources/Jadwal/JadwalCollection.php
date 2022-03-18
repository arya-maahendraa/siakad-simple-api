<?php

namespace App\Http\Resources\Jadwal;

use Illuminate\Http\Resources\Json\ResourceCollection;

class JadwalCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => 'success',
            'data' => $this->collection
        ];
    }
}
