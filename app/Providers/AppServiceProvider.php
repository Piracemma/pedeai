<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Relation::morphMap([
            'Carrinho' => 'App\Models\Carrinho',
            'Categoria' => 'App\Models\Categoria',
            'Finalizadora' => 'App\Models\Finalizadora',
            'Opcional' => 'App\Models\Opcional',
            'Produto' => 'App\Models\Produto',
            'User' => 'App\Models\User',
            'Venda' => 'App\Models\Venda',
            'VendaItem' => 'App\Models\VendaItem',
            'VendaOpcional' => 'App\Models\VendaOpcional',
        ]);
    }
}
