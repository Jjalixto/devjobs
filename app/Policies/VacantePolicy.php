<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //previene que el usuario pueda ver el model
        return $user -> rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //previene que el usuario pueda ver el model
        return $user -> rol === 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante)
    {
        //es para que otra persona no actualice otra vacante que no sea suya
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
