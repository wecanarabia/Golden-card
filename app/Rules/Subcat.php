<?php

namespace App\Rules;

use App\Models\Subcategory;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Subcat implements ValidationRule
{
    private $category_id;
    public function __construct($category_id)
    {
        $this->category_id=$category_id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($value as $sub) {
            $sub = Subcategory::where('category_id',$this->category_id)->find($sub);
            if (!$sub) {
                $fail('The :attribute is not belongs to merchant type, please select merchant type from select box to see it\'s Subcategories.');
            }
        }
    }
}
