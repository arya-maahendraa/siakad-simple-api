<?php

namespace App\Policies;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DosenPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $dosenId
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, int $dosenId)
    {
        return $user->dosen->id === $dosenId;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $dosenId
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, int $dosenId)
    {
        return $user->dosen->id === $dosenId;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $dosenId
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, int $dosenId)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $dosenId
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, int $dosenId)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $dosen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, int $dosenId)
    {
        return false;
    }
}
