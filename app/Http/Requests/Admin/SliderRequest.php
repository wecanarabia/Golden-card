<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
            'image'=>'required_without:id|mimes:jpg,jpeg,gif,png|max:4000',
            'service_id'=>[ 'required', Rule::in($services)],
        ];
    }

    public function attributes(): array
    {
        return [
            'service_id' => 'Partner',
        ];
    }
}
