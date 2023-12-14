<?php

namespace App\Policies;

use App\Models\Informacion_investigadores;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InformacionInvestigadoresPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Informacion_investigadores $informacionInvestigadores): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Informacion_investigadores $informacionInvestigadores): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Informacion_investigadores $informacionInvestigadores): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Informacion_investigadores $informacionInvestigadores): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Informacion_investigadores $informacionInvestigadores): bool
    {
        //
    }
}
