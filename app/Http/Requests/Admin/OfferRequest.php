<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'discount_value'=>"required|numeric|min:0",
            'use_times'=>"required|integer|min:0",
            'discount_text' => 'required|min:4|max:255',
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png',
            'end_date'=>'required|date',
            'status'=>'required|in:0,1',
            'tags'=>'array|min:1',
            'tags.*'=>'numeric|exists:tags,id',
            'branches'=>'array|min:1',
            'branches.*'=>'numeric|exists:branches,id',

        ];
    }
}