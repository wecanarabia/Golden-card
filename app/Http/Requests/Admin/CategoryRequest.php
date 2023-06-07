<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Validation\Rule;
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
        $categories = Category::parent()->pluck('id')->toArray();
        if (!$this->has('parent_id')||$this['type']=='parent') {
            $this['parent_id'] = null;
        };
        unset($this['type']);
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'parent_id'=>[ 'nullable', Rule::in($categories)],
        ];
    }
}
