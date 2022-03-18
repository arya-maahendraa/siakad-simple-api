<?php

namespace App\Policies;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class JurusanPolicy
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
     * @param  int  $jurusan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, int $jurusan)
    {
        $userJurusan = DB::table('users')->select('jurusan.id as jurusan_id')
            ->join('dosen', 'users.id', '=', 'dosen.user_id')
            ->join('jurusan', 'dosen.jurusan_id', '=', 'jurusan.id')
            ->where('users.id', $user->id)
            ->first();

        return $userJurusan->jurusan_id === $jurusan;
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
     * @param  int  $jurusan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, int $jurusan)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $jurusan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Jurusan $jurusan)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $jurusan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, int $jurusan)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  int  $jurusan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, int $jurusan)
    {
        return false;
    }
}
