<?php

namespace App\Http\Requests;

use App\Models\Prodi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProdiRequest extends FormRequest
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
    public function rules()
    {
        if ($this->program_studi) {
            $data = Prodi::find($this->program_studi);
            if (!$data) throw new NotFoundHttpException('Prodi not found.');
        }
        return [
            "name" => "required|string|max:255",
            "jenjang" => "required|string|max:10",
            "jurusanId" => "required|numeric"
        ];
    }
}
