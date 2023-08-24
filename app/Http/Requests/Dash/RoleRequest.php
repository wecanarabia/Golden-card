<?php

namespace App\Http\Requests\Dash;

use App\Rules\RolePermissopn;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        return [
            'name' => 'required|min:4|max:255',
            "permissions"=>["required","array","min:1",new RolePermissopn],
        ];
    }
}
