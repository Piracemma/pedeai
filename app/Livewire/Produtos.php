<?php

namespace App\Livewire;

use App\Livewire\Forms\ProdutosForm;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Produtos extends Component
{
    use WithFileUploads;

    public ProdutosForm $produto;

    #[Layout('components.layouts.app',['cadastros' => true])]
    public function render()
    {        
        return view('livewire.produtos');
    }
}
