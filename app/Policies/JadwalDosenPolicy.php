<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JadwalDosenPolicy
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

    public function view(User $user, int $dosen)
    {
        if ($user->isDosen() && $user->dosen->id === $dosen) return true;
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function forceDelete(User $user)
    {
        return false;
    }
}
