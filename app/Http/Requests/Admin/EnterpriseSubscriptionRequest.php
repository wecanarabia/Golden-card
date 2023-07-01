<?php

namespace App\Http\Requests\Admin;

use App\Rules\DeterminEndDate;
use Illuminate\Foundation\Http\FormRequest;

class EnterpriseSubscriptionRequest extends FormRequest
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
            'num_of_users'=>'required_without:id|numeric|min:0',
            'enterprise_name'=>'required_without:id|min:4|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'num_of_users' => 'Number Of Users',
            'enterprise_name' => 'Enterprise Name',
        ];
    }
}
