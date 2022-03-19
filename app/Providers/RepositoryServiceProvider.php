<?php

namespace App\Providers;

use App\Interfaces\Repositories\EnrollJadwalRepositoryInterface;
use App\Interfaces\Repositories\EnrollMatkulRepositoryInterface;
use App\Interfaces\Repositories\FakultasRepositoryInterface;
use App\Interfaces\Repositories\JadwalDosenRepositoryInterface;
use App\Interfaces\Repositories\JadwalMahasiswaRepositoryInterface;
use App\Interfaces\Repositories\JadwalRepositoryInterface;
use App\Interfaces\Repositories\JurusanRepositoryInterface;
use App\Interfaces\Repositories\MahasiswaMatkulRepositoryInterface;
use App\Interfaces\Repositories\MataKuliahRepositoryInterface;
use App\Interfaces\Repositories\ProdiRepositoryInterface;
use App\Interfaces\Repositories\User\DosenRepositoryInterface;
use App\Interfaces\Repositories\User\MahasiswaRepositoryInterface;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Repositories\EnrollJadwalRepository;
use App\Repositories\EnrollMatkulRepository;
use App\Repositories\FakultasRepository;
use App\Repositories\JadwalDosenRepository;
use App\Repositories\JadwalMahasiswaRepository;
use App\Repositories\JadwalRepository;
use App\Repositories\JurusanRepository;
use App\Repositories\MahasiswaMatkulRepository;
use App\Repositories\MataKuliahRepository;
use App\Repositories\ProdiRepository;
use App\Repositories\User\DosenRepository;
use App\Repositories\User\MahasiswaRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            FakultasRepositoryInterface::class,
            FakultasRepository::class
        );

        $this->app->bind(
            JurusanRepositoryInterface::class,
            JurusanRepository::class
        );

        $this->app->bind(
            ProdiRepositoryInterface::class,
            ProdiRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            DosenRepositoryInterface::class,
            DosenRepository::class
        );

        $this->app->bind(
            MahasiswaRepositoryInterface::class,
            MahasiswaRepository::class
        );

        $this->app->bind(
            MataKuliahRepositoryInterface::class,
            MataKuliahRepository::class
        );

        $this->app->bind(
            EnrollJadwalRepositoryInterface::class,
            EnrollJadwalRepository::class
        );

        $this->app->bind(
            JadwalRepositoryInterface::class,
            JadwalRepository::class
        );

        $this->app->bind(
            JadwalMahasiswaRepositoryInterface::class,
            JadwalMahasiswaRepository::class
        );

        $this->app->bind(
            JadwalDosenRepositoryInterface::class,
            JadwalDosenRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
