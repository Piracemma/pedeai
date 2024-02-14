<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Rules\ValidaSenha;
use App\Rules\ValidaVendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class RegistroUsuario extends Component
{
    #[Validate(['required', 'string', 'max:255', 'min:3'])]
    public string $name = '';

    #[Validate(['required', 'string', 'lowercase', 'max:30', 'min:5', 'unique:'.User::class])]
    public string $username = '';

    #[Validate(['required', 'confirmed', 'min:8', 'max:32', new ValidaSenha])]
    public string $password = '';

    #[Validate(['required', 'string', 'min:8', 'max:32', new ValidaSenha])]
    public string $password_confirmation = '';

    #[Validate(['required', 'string', new ValidaVendedor])]
    public string $vendedor = 'false';

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.registro-usuario');
    }

    public function save()
    {
        $this->validate();

        $vendedor = false;

        if($this->vendedor == 'true') {
            $vendedor = true;
        }

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'vendedor' => $vendedor
        ]);

        //event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function updatedUsername()
    {

        $this->username = str_replace(' ', '', $this->username);

        $this->username = strtolower($this->username);

    }
}
