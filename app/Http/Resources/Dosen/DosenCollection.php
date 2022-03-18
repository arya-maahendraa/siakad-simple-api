<?php

namespace App\Http\Resources\Dosen;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DosenCollection extends ResourceCollection
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
