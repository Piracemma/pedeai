<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cadastros extends Component
{
    #[Layout('components.layouts.app',['cadastros' => true])]
    public function render()
    {
        return view('livewire.cadastros');
    }
}
