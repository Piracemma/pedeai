<?php

namespace App\Policies;

use App\Models\Produto;
use App\Models\User;

class ProdutoPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Produto $produto): bool
    {
        return $user?->id === $produto->vendedor_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, Produto $produto): bool
    {
        return $user?->id === $produto->vendedor_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Produto $produto): bool
    {
        return $user?->id === $produto->vendedor_id;
    }
}
