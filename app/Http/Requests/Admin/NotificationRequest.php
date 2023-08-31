<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
        if ($this->sending_times == 'One Time') {
            $request['number_of_times']=1;
            $request['sent']=1;
            $request['date_time']=Carbon::now()->addMinutes(2);
        }
        return [
            'english_title' => 'required|min:4|max:255',
            'arabic_title' => 'required|min:4|max:255',
            'english_body' => 'required|min:4|max:10000',
            'arabic_body' => 'required|min:4|max:10000',
            'date_time' => 'required_if:sending_times,Multible Times|after:now',
            'sending_times'=>'required|in:One Time,Multible Times',
            'number_of_times'=>'required_if:sending_times,Multible Times|numeric|min:2',
            'scheduale_time'=>'required_if:sending_times,Multible Times|numeric|min:1',
        ];
    }
    public function attributes(): array
    {
        return [
            'english_title' => 'English Title',
            'arabic_title' => 'Arabic Title',
            'english_body' => 'English Body',
            'arabic_body' => 'Arabic Body',
            'date_time' => 'Sending Date',

        ];
    }
}
