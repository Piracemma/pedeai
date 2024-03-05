<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ItensCategoria extends Component
{
    public Categoria $categoria;

    #[Validate(['required', 'string', 'min:3', 'max:30'])]
    public string $novaCategoria;

    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
        $this->novaCategoria = $this->categoria->nome;
    }

    public function render()
    {
        return view('livewire.itens-categoria');
    }

    public function edit()
    {
        sleep(1);

        $this->authorize('update', $this->categoria);

        $this->validate();

        $this->categoria->update([
            'nome' => $this->novaCategoria,
        ]);

        session()->flash('editado', 'Editado com sucesso!');

        $this->redirect('/cadastros/categorias');

    }

    public function delete()
    {
        sleep(1);

        $this->authorize('delete', $this->categoria);

        $this->categoria->delete();

        session()->flash('deletado', 'Deletado com sucesso!');

        return $this->redirectRoute('cadastros.categorias', navigate: true);

    }
}
