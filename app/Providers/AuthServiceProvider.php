<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Livewire\EditarProduto;
use App\Livewire\ProdutoItem;
use App\Models\Carrinho;
use App\Models\Categoria;
use App\Models\User;
use App\Policies\CategoriaPolicy;
use App\Policies\ProdutoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Categoria::class => CategoriaPolicy::class,
        ProdutoItem::class => ProdutoPolicy::class,
        EditarProduto::class => ProdutoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('viewvendedor', function (User $user, $username) {
            $vendedor = User::query()->where('username', $username)->first();

            return $vendedor?->username === $username;
        });
        Gate::define('delete-usuario', function (User $user, $id_carrinho) {
            $carrinho = Carrinho::query()->find($id_carrinho);

            return $carrinho?->user_id === $user?->id;
        });
    }
}
