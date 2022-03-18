<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EnrollJadwalService as Services;
use App\Interfaces\Repositories\EnrollJadwalRepositoryInterface as Reposiotry;
use App\Models\JadwalMahasiswa;
use App\Services\MahasiswaService;

class EnrollMatakuliahController extends Controller
{
    protected $service;
    public function __construct(Services $service)
    {
        $this->service = $service;
    }

    public function create(Request $request, $nim)
    {
        $mahasiswa = MahasiswaService::getByNim($nim);
        $this->authorize('enroll', [JadwalMahasiswa::class, $mahasiswa->id ?? -1]);

        $jadwal = $request->validate([
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|integer',
        ])['jadwal'];

        $this->service->enroll($jadwal, $mahasiswa);
        return response()->noContent();
    }

    public function remove(Reposiotry $repository, string $nim, int $jadwal)
    {
        $mahasiswa = MahasiswaService::getByNim($nim);
        $this->authorize('remove', [JadwalMahasiswa::class, $mahasiswa->id ?? -1]);
        $repository->remove($jadwal, $mahasiswa->id);
        return response()->noContent();
    }
}
