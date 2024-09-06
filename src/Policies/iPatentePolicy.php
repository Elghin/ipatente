<?php

namespace App\Policies;

use App\Models\User;
use App\Models\iPatente;
use Illuminate\Auth\Access\Response;

class iPatentePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin','Power User']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, iPatente $iPatente): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Admin','Power User']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, iPatente $iPatente): bool
    {
        return $user->hasRole(['Admin','Power User']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, iPatente $iPatente): bool
    {
        return $user->hasRole(['Admin','Power User']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, iPatente $iPatente): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, iPatente $iPatente): bool
    {
        //
    }
}
