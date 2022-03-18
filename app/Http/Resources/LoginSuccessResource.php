<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum as Role;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginSuccessResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'role' => Role::getRole($this->role_id),
            'profile' => $this->profile
        ];
    }
}
