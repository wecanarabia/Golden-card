<?php

namespace App\Http\Requests\Admin;

use App\Rules\DeterminEndDate;
use Illuminate\Foundation\Http\FormRequest;

class PromoCodeRequest extends FormRequest
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
            'start_date'=>'required|date',
            'end_date'=>['required','date',new DeterminEndDate($this->start_date)],
            'code'=>'required|min:4|max:255|unique:promo_codes,code,'.$this->id,
            'num_of_users'=>'required|numeric|min:0',
            'status'=>'required|in:0,1',
            'type'=>'required|in:fixed,percentage',
            'value'=>'required|numeric|min:0',
        ];
    }
}
