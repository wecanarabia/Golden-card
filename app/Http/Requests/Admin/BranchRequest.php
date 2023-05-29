<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Validation\Rule;
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
        $services = Service::pluck('id')->toArray();
        return [
            'english_name' => 'required|min:4|max:255',
            'arabic_name' => 'required|min:4|max:255',
            'service_id'=>[ 'required', Rule::in($services)],
            'area_id'=>'required|exists:areas,id',
            'lat'=>'required|numeric',
            'long'=>'required|numeric',
            'location'=>'required|min:4|max:255',
        ];
    }
}
