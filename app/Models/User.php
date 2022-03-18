<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'jenis_kelamin',
        'alamat',
        'profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "role" => RoleEnum::class,
    ];

    public function isAdmin(): bool
    {
        return $this->attributes['role_id'] === RoleEnum::Admin->value;
    }

    public function isDosen(): bool
    {
        return $this->attributes['role_id'] === RoleEnum::Dosen->value;
    }

    public function isMahasiswa(): bool
    {
        return $this->attributes['role_id'] === RoleEnum::Mahasiswa->value;
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id');
    }
}
