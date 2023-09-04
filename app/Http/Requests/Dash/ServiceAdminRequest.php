<?php

namespace App\Http\Requests\Dash;

use App\Models\Role;
use App\Models\Service;
use Illuminate\Validation\Rule;
use App\Services\AuthService;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ServiceAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $roles = Role::where('roleable_id',app(AuthService::class)->service())->where('roleable_type',get_class(app(Service::class)))->pluck('id')->toArray();
        return [
            'name'=>'required|min:4|max:255',
            'email'=>'required|min:5|email|max:255|email|unique:services,email|unique:service_admins,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'role_id'=>['required',Rule::in($roles)],
        ];
    }
    public function attributes(): array
    {
        return [
            'role_id' => 'Role',
        ];
    }
}
