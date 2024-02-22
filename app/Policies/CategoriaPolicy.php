<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoriaPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user?->id != null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Categoria $categoria): bool
    {
        return $user?->id === $categoria->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Categoria $categoria): bool
    {
        return $user?->id === $categoria->user_id;
    }
}
