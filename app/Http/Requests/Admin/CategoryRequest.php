<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if (!$this->has('parent_id')||$this['type']=='parent') {
            $this['parent_id'] = null;
        };
        unset($this['type']);
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png',
            'parent_id'=>'nullable|exists:categories,id'
        ];
    }
}
