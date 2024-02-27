<?php

namespace App\Livewire;

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Produto;
use App\Rules\ValidaCategoria;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProdutoUsuario extends Component
{
    public Produto $produtoItem;

    public function render()
    {
        return view('livewire.produto-usuario',[
            'categoria_atual' => Categoria::query()->where('id',$this->produtoItem->categoria_id)->first()
        ]);
    }
}
