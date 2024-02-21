<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaOpcionais implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $collection = collect($value);
        
        if($collection->isNotEmpty()){
            foreach($collection as $item) {
                $id = (float) $item;
                $opcional = user()->opcionais()->where('id', $id)->limit(1)->get();
                if($opcional->isEmpty()){
                    $fail('Categoria não encontrada!');
                }
            }            
        }
    }
}
