<?php

namespace App\Http\Resources\Prodi;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProdiCollection extends ResourceCollection
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
            "message" => "success",
            "data" => $this->collection
        ];
    }
}
