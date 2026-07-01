<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IndonesianPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Format valid: diawali 08, 62, atau +62, diikuti 8-13 digit angka
        if (!preg_match('/^(\+62|62|08)[0-9]{8,13}$/', $value)) {
            $fail('Kolom :attribute harus berupa nomor HP Indonesia yang valid (contoh: 0812xxxxxxxx atau +62812xxxxxxxx).');
        }
    }
}
