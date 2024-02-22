<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Categorias extends Component
{
    #[Validate(['required', 'string', 'min:3', 'max:30'])]
    public string $categoria = '';

    #[Layout('components.layouts.app',['cadastros' => true])]
    public function render()
    {
        return view('livewire.categorias', [
            'categorias' => user()->categorias()->select(['id', 'nome'])->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function save()
    {
        sleep(1);
        $this->validate();

        $categoria = user()->categorias()->create([
            'nome' => $this->categoria,
        ]);

        $this->categoria = '';

        if(!empty($categoria->id)){
            session()->flash('sucesso', 'Criado com sucesso!');
        } else {
            session()->flash('erro', 'Erro ao criar Categoria!');
        }
    }

}
