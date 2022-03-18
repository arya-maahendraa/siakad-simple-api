<?php

namespace App\Http\Controllers\Api;

use App\Enums\Nilai;
use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\EnrollJadwalRepositoryInterface as Repository;
use App\Models\JadwalMahasiswa;
use App\Services\MahasiswaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class NilaiMahasiswaController extends Controller
{
    protected $repository;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    public function update(Request $request, string $nim, int $jadwal)
    {
        $mahasiswa = MahasiswaService::getByNim($nim);
        $this->authorize('update', [JadwalMahasiswa::class, $mahasiswa->id ?? -1]);

        $nilai = $request->validate([
            'nilai' => ['required', 'string', new Enum(Nilai::class)]
        ])['nilai'];

        $this->repository->nilai($jadwal, $mahasiswa->id, $nilai);
        return response()->noContent();
    }
}
