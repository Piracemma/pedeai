<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Vendedor extends Component
{
    public function render()
    {
        return view('livewire.vendedor', [
            'vendas' => user()->vendas()->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function novavenda()
    {
        session()->flash('sucesso', 'Você possui uma nova venda');
        return $this->redirectRoute('vendedor', navigate:true);
    }

    public function getListeners()
    {
        return [
            "echo:nova-venda-".user()->id.",CompraRealizadaEvent" => 'novavenda',
        ];
    }
}
