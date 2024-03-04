<?php

namespace App\Rules;

use App\Models\Finalizadora;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaFinalizadora implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id = (int) $value;

        $finalizadora = Finalizadora::query()->where('id', $id)->get();

        if($finalizadora->isEmpty()){
            $fail('Finalizadora não encontrada');
        }
    }
}
