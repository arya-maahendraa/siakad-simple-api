<?php

namespace App\Http\Requests;

use App\Models\Jurusan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JurusanRequest extends FormRequest
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
        if ($this->jurusan) {
            $data = Jurusan::find($this->jurusan);
            if (!$data) throw new NotFoundHttpException('Jurusan not found.');
        }
        return [
            "name" => "required|string",
            "fakultasId" => "required|numeric"
        ];
    }
}
