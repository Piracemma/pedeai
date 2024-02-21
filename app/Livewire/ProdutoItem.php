<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutoItem extends Component
{
    public Produto $produtoItem;

    public function render()
    {
        return view('livewire.produto-item');
    }
}
