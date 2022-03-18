<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Fakultas' => 'App\Policies\FakultasPolicy',
        'App\Models\Jurusan' => 'App\Policies\JurusanPolicy',
        'App\Models\Prodi' => 'App\Policies\ProdiPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Dosen' => 'App\Policies\DosenPolicy',
        'App\Models\Mahasiswa' => 'App\Policies\MahasiswaPolicy',
        'App\Models\MataKuliah' => 'App\Policies\MataKuliahPolicy',
        'App\Models\JadwalMahasiswa' => 'App\Policies\JadwalMahasiswaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
