<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Rules\ValidaSenha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class RegistroUsuario extends Component
{
    #[Validate(['required', 'string', 'max:255', 'min:3'])]
    public string $name = '';

    #[Validate(['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class])]
    public string $email = '';

    #[Validate(['required', 'confirmed', 'min:8', 'max:32', new ValidaSenha])]
    public string $password = '';

    #[Validate(['required', 'string', 'min:8', 'max:32', new ValidaSenha])]
    public string $password_confirmation = '';

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.registro-usuario');
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        //event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
