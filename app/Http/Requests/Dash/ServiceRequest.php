<?php

namespace App\Http\Requests\Dash;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Category;
class ServiceRequest extends FormRequest
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
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_description' => 'required|min:4|max:10000',
            'arabic_description' => 'required|min:4|max:10000',
            'email'=>'required|min:5|email|max:255|unique:service_admins,email|unique:services,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'phone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:services,phone,'.$this->id,
            'code'=>'required|min:4|max:255|unique:services,code,'.$this->id,
            'logo'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'ipan' => 'required|min:4|max:255',
            'first_contact' => 'nullable|min:4|max:255',
            'second_contact' => 'nullable|min:4|max:255',
            'subcategories'=>'array|min:1',
            'subcategories.*'=>'required|exists:subcategories,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'english_name' => 'English Name',
            'arabic_name' => 'Arabic Name',
            'english_description' => 'English Description',
            'arabic_description' => 'Arabic Description',
            'first_contact'=>'First Contact',
            'second_contact'=>'Second Contact',
        ];
    }
}
