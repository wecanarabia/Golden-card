<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Validation\Rule;
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
        $services = Service::pluck('id')->toArray();
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'english_description' => 'required|min:4|max:10000',
            'arabic_description' => 'required|min:4|max:10000',
            'discount_value'=>"required|numeric|min:0",
            'use_times'=>"required|integer|min:0",
            'discount_text' => 'required|min:4|max:255',
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'status'=>'nullable|in:0,1,2,3',
            'service_id'=>[ 'required_without:id', Rule::in($services)],
            'tags'=>'array|min:1',
            'tags.*'=>'numeric|exists:tags,id',
            'branches'=>'array|min:1',
            'branches.*'=>'numeric|exists:branches,id',

        ];
    }

    public function attributes(): array
    {
        return [
            'discount_text' => 'Discount Text',
            'discount_value' => 'Discount Value',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'use_times' => 'Use Times',
            'english_name' => 'English Name',
            'arabic_name' => 'Arabic Name',
            'english_description' => 'English Description',
            'arabic_description' => 'Arabic Description',
            'service_id' => 'Partner',
        ];
    }

}
