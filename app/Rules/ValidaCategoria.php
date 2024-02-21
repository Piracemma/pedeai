<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaCategoria implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id = (int) $value;

        $categoria = user()->categorias()->where('id', $id)->limit(1)->get();
        
        if($categoria->isEmpty()){
            $fail('Categoria não encontrada!');
        }
        
    }
}
