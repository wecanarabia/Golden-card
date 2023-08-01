<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;
class DeterminEndDate implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $start_date;
    public function __construct($start_date)
    {
        $this->start_date=$start_date;
    }

    /**
     * Determine if the validation rule passes.
     * check end date to determine in validation
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value != null && $value <= $this->start_date) {
            $fail('The :attribute must be after start date value.');
        }
    }
}
