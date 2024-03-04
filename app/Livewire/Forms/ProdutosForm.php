<?php

namespace App\Livewire\Forms;

use App\Rules\ValidaCategoria;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProdutosForm extends Form
{
    use WithFileUploads;

    #[Validate(['required', 'string', 'min:5', 'max:50'])]
    public string $nome = '';

    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $descricao = '';

    #[Validate(['required', 'decimal:0,2'])]
    public ?float $preco;

    #[Validate]
    public $imagem;

    #[Validate(['integer', new ValidaCategoria])]
    public $categoria;

    public function rules()
    {
        return [
            'imagem' => ['image', Rule::dimensions()->ratio(1 / 1)],
        ];
    }
}
