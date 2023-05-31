<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        $categories = Category::sub()->pluck('id')->toArray();
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_description' => 'required|min:4|max:10000',
            'arabic_description' => 'required|min:4|max:10000',
            'email'=>'required|min:5|email|max:255|unique:services,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'phone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:services,phone,'.$this->id,
            'code'=>'required|min:4|max:255',
            'category_id'=>[ 'required', Rule::in($categories)],
            'logo'=>'required_without:id|mimes:jpg,jpeg,gif,png',
            'status'=>'required|in:0,1',
        ];
    }
}
