<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use App\Rules\Subcat;
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
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_description' => 'required|min:4|max:10000',
            'arabic_description' => 'required|min:4|max:10000',
            'email'=>'required|min:5|email|max:255|unique:service_admins,email|unique:services,email,'.$this->id,
            'password' => ['required_without:id', 'nullable',Password::min(8)],
            'phone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/|unique:services,phone,'.$this->id,
            'code'=>'required|min:4|max:255|unique:services,code,'.$this->id,
            'subcategories'=>['required','array','min:1',new Subcat($this->category_id)],
            'subcategories.*'=>['required','exists:subcategories,id'],            'logo'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'status'=>'nullable|in:0,1',
            'lat'=>'nullable|numeric',
            'long'=>'nullable|numeric',
            'location'=>'nullable|min:0|max:255',
            'ipan' => 'nullable|min:4|max:255',
            'profit_margin' => 'required|numeric',
            'classification' => 'required|integer',
            'category_id'=>'required|exists:categories,id',

        ];
    }

    public function attributes(): array
    {
        return [
            'english_name' => 'English Name',
            'arabic_name' => 'Arabic Name',
            'profit_margin' => 'Profit Margin',
            'english_description' => 'English Description',
            'arabic_description' => 'Arabic Description',
            'category_id' => 'Merchant Type',
        ];
    }
}
