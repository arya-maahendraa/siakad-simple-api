<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum as Role;
use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Repositories\User\UserRepositoryInterface as Repository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminFormRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Repository $repository)
    {
        $method = $this->method();
        if ($this->admin && $method === 'PUT') {
            $repository->setRole(Role::Admin);
            $repository->byId($this->admin);
        }

        return $this->getUserRules($method, $this->admin);
    }
}
