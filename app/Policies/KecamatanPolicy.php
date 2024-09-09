<?php

namespace App\Policies;

use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KecamatanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_kecamatan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kecamatan $kecamatan): bool
    {
        return $user->can('view_kecamatan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_kecamatan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kecamatan $kecamatan): bool
    {
        return $user->can('update_kecamatan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kecamatan $kecamatan): bool
    {
        return $user->can('delete_kecamatan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kecamatan $kecamatan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kecamatan $kecamatan): bool
    {
        //
    }
}
