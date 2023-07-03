<?php

namespace App\Http\Requests\Dash;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'area_id'=>'required|exists:areas,id',
            'lat'=>'required|numeric',
            'long'=>'required|numeric',
            'location'=>'required|min:4|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'english_name' => 'English Name',
            'arabic_name' => 'Arabic Name',
            'area_id' => 'Area',
        ];
    }
}
