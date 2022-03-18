<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Repositories\MataKuliahRepositoryInterface as Repository;

class MataKuliahFormRequest extends FormRequest
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
        if ($this->mata_kuliah && $this->method() === 'PUT')
            $repository->byId($this->mata_kuliah);
        return [
            'name' => 'required|string',
            'kode' => 'required|string|unique:mata_kuliah,kode, ' . $this->mata_kuliah ?? '',
            'sks' => 'required|numeric|max:10',
            'prodiId' => 'required|numeric',

        ];
    }
}
