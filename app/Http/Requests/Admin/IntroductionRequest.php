<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'english_title' => 'required|min:4|max:255',
            'arabic_title' => 'required|min:4|max:255',
            'english_second_title' => 'required|min:4|max:255',
            'arabic_second_title' => 'required|min:4|max:255',
            'english_body' => 'required|min:4|max:10000',
            'arabic_body' => 'required|min:4|max:10000',
        ];
    }

    public function attributes(): array
    {
        return [
            'english_title' => 'English Title',
            'arabic_title' => 'Arabic Title',
            'english_second_title' => 'English Second Title',
            'arabic_second_title' => 'Arabic Second Title',
            'english_body' => 'English Body',
            'arabic_body' => 'Arabic Body',
        ];
    }
}
