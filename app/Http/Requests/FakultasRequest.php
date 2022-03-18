<?php

namespace App\Http\Requests;

use App\Models\Fakultas;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FakultasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->fakulta) {
            $data = Fakultas::find($this->fakulta);
            if (!$data) throw new NotFoundHttpException('Fakultas not found.');
        }
        return [
            "name" => "required|string"
        ];
    }
}
