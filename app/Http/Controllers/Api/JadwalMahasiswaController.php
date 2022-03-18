<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Jadwal\JadwalCollection;
use App\Interfaces\Repositories\JadwalMahasiswaRepositoryInterface as Repository;
use App\Services\MahasiswaService;

class JadwalMahasiswaController extends Controller
{
    protected $reposiotry;
    public function __construct(Repository $repository)
    {
        $this->reposiotry = $repository;
    }
    public function index($nim)
    {
        $mahasiswa = MahasiswaService::getByNim($nim);
        $this->authorize('viewAny', [JadwalMahasiswa::class, $mahasiswa->id ?? -1]);
        $jadwal = $this->reposiotry->all($mahasiswa->id);
        return response()->json(new JadwalCollection($jadwal), 200);
    }
}
