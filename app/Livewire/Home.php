<?php

namespace App\Livewire;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{
    public User $vendedor;

    #[Validate(['string', 'max:255'])]
    public string $observacao = '';

    #[Validate(['required', 'integer', 'min:1'])]
    public int $quantidade = 1;

    public function mount($username)
    {
        if (! Gate::allows('viewvendedor', [$username])) {
            abort(403);
        } else {
            $this->vendedor = User::query()->where('username', $username)->first();
        }

    }

    public function render()
    {
        return view('livewire.home', [
            'categorias' => $this->vendedor->categorias()->get(),
            'vendedor' => $this->vendedor->id,
        ]);
    }

    public function adicionar(Produto $produto)
    {
        if ($this->vendedor->id === $produto?->vendedor_id) {

            $this->validate();

            $carrinho = Carrinho::query()->create([
                'user_id' => user()->id,
                'vendedor_id' => $this->vendedor->id,
                'produto_id' => $produto->id,
                'quantidade' => $this->quantidade,
                'observacao_produto' => $this->observacao,
            ]);

            $this->reset('observacao', 'quantidade');

            if ($carrinho->id) {

                $this->dispatch('carrinho');

            } else {

                session()->flash('errocarrinho', 'Erro, tente novaemnte!');

            }
        } else {
            abort(403);
        }

    }
}
