<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JadwalMahasiswaPolicy
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

    public function viewAny(User $user, ?int $mahasiswa)
    {
        if ($user->mahasiswa->id === $mahasiswa) return true;
        return false;
    }

    public function update(User $user, ?int $mahasiswa)
    {
        if ($user->mahasiswa->id === $mahasiswa) return true;
        return false;
    }

    public function enroll(User $user, ?int $mahasiswa)
    {
        if ($user->mahasiswa->id === $mahasiswa) return true;
        return false;
    }

    public function remove(User $user, ?int $mahasiswa)
    {
        if ($user->mahasiswa->id === $mahasiswa) return true;
        return false;
    }
}
