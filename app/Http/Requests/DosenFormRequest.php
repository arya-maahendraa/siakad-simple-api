<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Repositories\User\DosenRepositoryInterface as Repository;

class DosenFormRequest extends FormRequest
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

    protected function getRules(?int $dosen = null, ?int $user = null): array
    {
        return array_merge(
            $this->getUserRules($this->method(), $user),
            [
                'jurusanId' => 'required|numeric',
                'nip' => 'string|nullable|max:18|unique:dosen,nip,' . $dosen ?? '',
                'nidn' => 'string|nullable|max:10|unique:dosen,nidn,' . $dosen ?? '',
                'nidk' => 'string|nullable|max:10|unique:dosen,nidk,' . $dosen ?? '',
                'nup' => 'string|nullable|max:10|unique:dosen,nup,' . $dosen ?? '',
                'pns' => 'required|numeric|between:0,1',
                'golongan' => 'string|nullable|max:8',
                'fungsional' => 'string|nullable|max:50'
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
        $user = null;
        $dosen = $this->dosen;
        if ($dosen && $this->method() === 'PUT') {
            $user = $repository->byId($dosen)->user_id;
        }
        return $this->getRules($dosen, $user);
    }
}
