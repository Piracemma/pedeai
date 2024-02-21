<?php

namespace App\Livewire;

use App\Models\Opcional;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Opcionais extends Component
{
    #[Validate(['required', 'string', 'min:3', 'max:30'])]
    public string $nome = '';

    #[Validate(['required', 'decimal:0,2'])]
    public ?float $preco;

    #[Layout('components.layouts.app',['cadastros' => true])]
    public function render()
    {
        return view('livewire.opcionais',[
            'opcionais' => user()->opcionais()->select(['id', 'nome', 'preco'])->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function save()
    {
        sleep(1);
        $this->validate();
        
        $opcional = user()->opcionais()->create([
            'nome' => $this->nome,
            'preco' => $this->preco
        ]);

        $this->nome = '';
        $this->preco;

        if(!empty($opcional->id)){
            session()->flash('sucesso', 'Criado com sucesso!');
        } else {
            session()->flash('erro', 'Erro ao criar Opcional!');
        }

        $this->redirect('/cadastros/opcionais');

    }
}
