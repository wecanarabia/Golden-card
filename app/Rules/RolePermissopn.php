<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RolePermissopn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (in_array('control',$value)&&!in_array('view',$value)) {
            $fail('This role (Full Control) not allowed to be added without choosing the othe role(View only)');
        }
    }
}
