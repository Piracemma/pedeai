<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class Home extends Component
{
    public User $vendedor;

    // public Categoria $categorias;

    public function mount($username)
    {
        if(!Gate::allows('viewvendedor', [$username])) {
            abort(403);
        } else {
            $this->vendedor = User::query()->where('username', $username)->first();
        }

    }

    public function render()
    {
        return view('livewire.home', [
            'categorias' => $this->vendedor->categorias()->get(),
            'vendedor' => $this->vendedor->id
        ]);
    }
}
