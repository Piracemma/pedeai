<?php

namespace App\Livewire;

use App\Events\CompraRealizadaEvent;
use App\Models\Carrinho;
use App\Models\Finalizadora;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use App\Rules\ValidaFinalizadora;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Finalizar extends Component
{
    public User $vendedor;

    public Collection $carrinho;

    public Collection $finalizadoras;

    public ?float $sum_produtos;

    #[Validate(['required', 'integer', new ValidaFinalizadora])]
    public ?int $finalizadora;

    #[Validate(['string', 'max:255'])]
    public string $observacao_venda = '';

    public function mount($username)
    {
        if (! Gate::allows('viewvendedor', [$username])) {
            abort(403);
        } else {
            $this->vendedor = User::query()->where('username', $username)->first();
            $this->carrinho = Carrinho::query()->where('vendedor_id', $this->vendedor->id)->where('user_id', user()->id)->orderBy('created_at', 'desc')->get();
            if($this->carrinho->isEmpty()){
                $this->redirectRoute('home', ['username' => $username], navigate:true);
            }
            $this->finalizadoras = Finalizadora::query()->get();

            $sum_produtos = 0;

            foreach ($this->carrinho as $produto) {

                $valor = Produto::query()->where('id', $produto->produto_id)->first();

                if (isset($valor->id)) {
                    $sum_produtos = $sum_produtos + ($produto->quantidade * $valor->preco);
                } else {
                    Carrinho::query()->where('produto_id', $produto->produto_id)->delete();
                }

            }

            $this->sum_produtos = $sum_produtos;
        }
    }

    public function render()
    {
        return view('livewire.finalizar');
    }

    public function remover($id_carrinho)
    {
        sleep(1);
        if (! Gate::allows('delete-usuario', [$id_carrinho])) {
            abort(403);
        } else {
            Carrinho::query()->where('id', $id_carrinho)->delete();
            $this->dispatch('carrinho');
        }
    }

    #[On('carrinho')]
    public function attCarrinho()
    {
        $this->carrinho = Carrinho::query()->where('vendedor_id', $this->vendedor->id)->where('user_id', user()->id)->orderBy('created_at', 'desc')->get();
        if($this->carrinho->isEmpty()){
            $this->redirectRoute('home', ['username' => $this->vendedor->username], navigate:true);
        }
        $sum_produtos = 0;

        foreach ($this->carrinho as $produto) {

            $valor = Produto::query()->where('id', $produto->produto_id)->first();

            if (isset($valor->id)) {
                $sum_produtos = $sum_produtos + ($produto->quantidade * $valor->preco);
            } else {
                Carrinho::query()->where('produto_id', $produto->produto_id)->delete();
            }

        }

        $this->sum_produtos = $sum_produtos;
    }

    public function finalizar()
    {
        $this->validate();

        $total = 0;

        foreach ($this->carrinho as $produto) {

            $valor = Produto::query()->where('id', $produto->produto_id)->first();

            if (isset($valor->id)) {
                $total = $total + ($produto->quantidade * $valor->preco);
            } else {
                abort(403);
            }

        }

        $venda = Venda::query()->create([
            'finalizadora_id' => $this->finalizadora,
            'user_id' => user()->id,
            'vendedor_id' => $this->vendedor->id,
            'total' => $total,
            'observacao' => $this->observacao_venda
        ]);

        if(isset($venda->id)){

            if($this->carrinho->isNotEmpty()){

                foreach ($this->carrinho as $produto) {

                    $valor = Produto::query()->where('id', $produto->produto_id)->first();

                    $venda->vendaitens()->create([
                        'produto' => $valor->nome,
                        'preco' => $valor->preco,
                        'quantidade' => $produto->quantidade,
                        'total' => ($valor->preco * $produto->quantidade),
                        'observacao' => $produto->observacao_produto,
                    ]);

                }
                foreach ($this->carrinho as $produto) {

                    $produto->delete();

                }
                CompraRealizadaEvent::dispatch($this->vendedor->id);
                session()->flash('sucesso', 'Finalizado com sucesso!');
                $this->redirectRoute('dashboard', navigate:true);

            } else {

                $this->redirectRoute('home', ['username' => $this->vendedor->username], navigate:true);
            }

        } else {

            session()->flash('erro', 'Erro ao finalizar a venda, tente novamente!');
            $this->redirectRoute('finalizar', ['username' => $this->vendedor->username], navigate:true);
            
        }
    }
}
