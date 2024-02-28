<?php

namespace App\Livewire;

namespace App\Livewire;

use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\Produto;
use App\Rules\ValidaCategoria;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProdutoUsuario extends Component
{
    public Produto $produtoItem;

    #[Validate(['string','max:255'])]
    public string $observacao = '';

    #[Validate(['required', 'integer', 'min:1'])]
    public int $quantidade = 1;

    public function render()
    {
        return view('livewire.produto-usuario',[
            'categoria_atual' => Categoria::query()->where('id',$this->produtoItem->categoria_id)->first()
        ]);
    }

    public function adicionar()
    {
        $this->validate();

        $carrinho = Carrinho::query()->create([
            'user_id' => user()->id,
            'vendedor_id' => $this->produtoItem->vendedor_id,
            'produto_id' => $this->produtoItem->id,
            'quantidade' => $this->quantidade,
            'observacao_produto' => $this->observacao
        ]);

        if($carrinho->id) {

            $this->dispatch('carrinho');

        } else {

            session()->flash('errocarrinho', 'Criado com sucesso!');

            $this->redirectRoute('home', navigate: true);

        }
        
    }

}
