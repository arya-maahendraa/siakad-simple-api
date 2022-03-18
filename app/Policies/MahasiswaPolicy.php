<?php

namespace App\Policies;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MahasiswaPolicy
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
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, int $id)
    {
        $mahasiswa = Mahasiswa::select('dosen_id')->find($id);
        if (!$mahasiswa) return false;
        if ($user->isDosen() && $user->dosen->id === $mahasiswa->dosen_id) return true;
        if ($user->isMahasiswa() && $user->mahasiswa->id === $id) return true;
        return false;
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
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }
}
