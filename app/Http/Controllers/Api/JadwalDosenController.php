<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Jadwal\JadwalCollection;
use App\Interfaces\Repositories\JadwalDosenRepositoryInterface as Repository;
use App\Models\JadwalDosen;

class JadwalDosenController extends Controller
{
    protected $repository;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index($dosen)
    {
        $this->authorize('view', [JadwalDosen::class, $dosen]);
        $jadwal = $this->repository->all($dosen);
        return response()->json(new JadwalCollection($jadwal), 200);
        
    }

    public function create(int $dosen, int $jadwal)
    {
        $this->authorize('create', [JadwalDosen::class]);
        $this->repository->create($dosen, $jadwal);
        return response()->noContent();
    }

    public function destroy(int $dosen, int $jadwal)
    {
        $this->authorize('forceDelete', [JadwalDosen::class]);
        $this->repository->remove($dosen, $jadwal);
        return response()->noContent();
    }
}
