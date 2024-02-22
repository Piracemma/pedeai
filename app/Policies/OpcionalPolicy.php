<?php

namespace App\Policies;

use App\Models\Opcional;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OpcionalPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, Opcional $opcional): bool
    {
        return $user?->id === $opcional->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Opcional $opcional): bool
    {
        return $user?->id === $opcional->user_id;
    }
}
