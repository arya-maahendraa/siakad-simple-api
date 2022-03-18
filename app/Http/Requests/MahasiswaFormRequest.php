<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Repositories\User\MahasiswaRepositoryInterface as Repository;

class MahasiswaFormRequest extends FormRequest
{
    use UserValidationRules;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function getRules(?int $mahasiswa, ?int $user): array
    {
        return array_merge(
            $this->getUserRules($this->method(), $user),
            [
                'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $mahasiswa ?? '',
                'noIjaza' => 'string|nullable|unique:mahasiswa,no_ijaza,' . $mahasiswa ?? '',
                'sekolahAsal' => 'string|nullable',
                'dosenId' => 'required|numeric',
                'prodiId' => 'required|numeric',
                'namaAyah' => 'string|nullable',
                'namaIbu' => 'string|nullable',
                'pekerjaanAyah' => 'string|nullable',
                'pekerjaanIbu' => 'string|nullable',
                'alamatOrangtua' => 'string|nullable',
                'statusAwal' => 'required|max:100|string',
                'status' => 'required|max:50|string',
            ]
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Repository $repository)
    {
        $mahasiswa = $this->mahasiswa;
        $user = null;
        if ($mahasiswa && $this->method() === 'PUT') {
            $user = $repository->byId($mahasiswa)->user_id;
        }

        return $this->getRules($mahasiswa, $user);
    }
}
