<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'english_details' => 'required|min:4|max:10000',
            'arabic_details' => 'required|min:4|max:10000',
            'period'=>'required|integer|min:0',
            'price'=>'required|numeric|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'english_name' => 'English Name',
            'arabic_name' => 'Arabic Name',
            'english_details' => 'English Details',
            'arabic_details' => 'Arabic Details',
        ];
    }
}
