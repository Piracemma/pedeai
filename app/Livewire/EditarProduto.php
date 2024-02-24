<?php

namespace App\Livewire;

use App\Models\Produto;
use App\Rules\ValidaCategoria;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditarProduto extends Component
{
    public Produto $produto;

    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $descricao;

    #[Validate(['required', 'decimal:0,2'])]
    public ?float $preco;

    #[Validate(['integer', new ValidaCategoria])]
    public $categoria;

    public function mount(Produto $produto)
    {
        $this->produto = $produto;
        $this->descricao = $this->produto->descricao;
        $this->preco = $this->produto->preco;
        $this->categoria = $this->produto->categoria_id;
    }

    public function render()
    {
        $this->authorize('view', $this->produto);
        return view('livewire.editar-produto', [
            'todas_categorias' => user()->categorias()->get()
        ]);
    }

    public function save()
    {
        $this->authorize('edit', $this->produto);
        $this->validate();

        $this->produto->update([
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria
        ]);

        session()->flash('editado', 'Criado com sucesso!');

        $this->redirect('/lista-produtos');

    }
}
