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
        return view('livewire.produtos', [
            'todas_categorias' => user()->categorias()->get(),
            'todos_produtos' => user()->produtos()->get()
        ]);
    }

    public function save()
    {
        $this->validate();

        $imagem = $this->produto->imagem->store(path: 'fotos');

        $produto = user()->produtos()->create([
            'categoria_id' => $this->produto->categoria,
            'nome' => $this->produto->nome,
            'descricao' => $this->produto->descricao,
            'preco' => $this->produto->preco,
            'imagem' => $imagem,
        ]);

        if($produto->isNotEmpty()){
            session()->flash('sucesso', 'Criado com sucesso!');
        } else {
            session()->flash('erro', 'Erro ao criar Opcional!');
        }

        $this->redirect('/cadastros/produtos');

    }
    
}
