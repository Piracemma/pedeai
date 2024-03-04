<?php

namespace App\Livewire;

use Livewire\Component;

class ListaProdutos extends Component
{
    public function render()
    {
        return view('livewire.lista-produtos', [
            'produtos' => user()->produtos()->orderBy('updated_at', 'desc')->get(),
        ]);
    }
}
