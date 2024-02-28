<?php

namespace App\Livewire;

use App\Models\Carrinho as ModelsCarrinho;
use App\Models\Produto;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Carrinho extends Component
{
    public User $vendedor;

    public int $count_produtos;

    public float $sum_produtos;

    public Collection $carrinho;

    public function mount()
    {

        $carrinho = ModelsCarrinho::query()->where('user_id', user()->id)->where('vendedor_id', $this->vendedor->id)->get();

        $sum_produtos = 0;

        $count_produtos = 0;
        
        foreach($carrinho as $produto){

            $valor = Produto::query()->where('id', $produto->produto_id)->first();

            if(isset($valor->id)){
                $sum_produtos = $sum_produtos + ( $produto->quantidade * $valor->preco );
                $count_produtos = $count_produtos + $produto->quantidade;
            } else {
                ModelsCarrinho::query()->where('produto_id', $produto->produto_id)->delete();
            }            

        }

        $this->sum_produtos = $sum_produtos;

        $this->count_produtos = $count_produtos;

        $carrinho = ModelsCarrinho::query()->where('user_id', user()->id)->where('vendedor_id', $this->vendedor->id)->get();

        $this->carrinho = $carrinho;

    }

    public function render()
    {
        return view('livewire.carrinho', [
            'produtos' => 'podutos'
        ]);
    }

    #[On('carrinho')]
    public function refresh(){
        $this->mount();
    }

}
