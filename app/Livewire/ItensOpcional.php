<?php

namespace App\Livewire;

use App\Models\Opcional;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ItensOpcional extends Component
{
    public Opcional $opcional;

    #[Validate(['required', 'string', 'min:3', 'max:30'])]
    public string $novoOpcional;

    #[Validate(['required', 'decimal:0,2'])]
    public float $novoPreco;

    public function mount(Opcional $opcional)
    {
        $this->opcional = $opcional;
        $this->novoOpcional = $this->opcional->nome;
        $this->novoPreco = $this->opcional->preco;
    }

    public function render()
    {
        return view('livewire.itens-opcional');
    }

    public function edit()
    {
        sleep(1);
        $this->authorize('edit', $this->opcional);
        $this->validate();

        $opcional = $this->opcional->update([
            'nome' => $this->novoOpcional,
            'preco' => $this->novoPreco
        ]);

        session()->flash('editado', 'Criado com sucesso!');

        $this->redirect('/cadastros/opcionais');

    }

    public function delete()
    {
        sleep(1);
        $this->authorize('delete', $this->opcional);

        $this->opcional->delete();

        session()->flash('deletado', 'Criado com sucesso!');

        $this->redirect('/cadastros/opcionais');
        
    }

}
