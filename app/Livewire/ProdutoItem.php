<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Produto;
use App\Rules\ValidaCategoria;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProdutoItem extends Component
{
    public Produto $produtoItem;

    public function render()
    {
        return view('livewire.produto-item',[
            'categoria_atual' => Categoria::query()->where('id',$this->produtoItem->categoria_id)->first()
        ]);
    }

    public function delete()
    {
        $this->authorize('delete', $this->produtoItem);

        Storage::delete($this->produtoItem->imagem);

        $this->produtoItem->delete();

        session()->flash('deletado', 'Criado com sucesso!');

        return $this->redirectRoute('listaprodutos', navigate: true);
    }

    public function editar()
    {
        return $this->redirectRoute('editarproduto', ['produto' => $this->produtoItem], navigate: true);
    }

}
