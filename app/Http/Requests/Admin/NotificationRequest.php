<?php

namespace App\Http\Requests\Admin;

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
        if (!$this->has('user_id')) {
            $this['user_id'] = null;
        };
        return [
            'english_title' => 'required|min:4|max:255',
            'arabic_title' => 'required|min:4|max:255',
            'english_body' => 'required|min:4|max:10000',
            'arabic_body' => 'required|min:4|max:10000',
            'user_id' => 'nullable|exists:users,id',

        ];
    }
}
