<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Repositories\JadwalRepositoryInterface as Repository;

class JadwalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Repository $repository)
    {
        if ($this->jadwal) $repository->byId($this->jadwal);
        return [
            'tahunAjaranId' => 'required|integer',
            'hari' => 'required|string|max:20',
            'jam' => 'required|string|max:20',
            'kelas' => 'required|string|max:10',
            'matkulId' => 'required|integer',
        ];
    }
}
