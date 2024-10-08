<?php

namespace App\Policies;

use App\Models\Desa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DesaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_desa');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Desa $desa): bool
    {
        return $user->can('view_desa');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_desa');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Desa $desa): bool
    {
        return $user->can('update_desa');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Desa $desa): bool
    {
        return $user->can('delete_desa');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Desa $desa): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Desa $desa): bool
    {
        //
    }
}
