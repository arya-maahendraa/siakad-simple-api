<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalFormRequest;
use App\Http\Resources\Jadwal\JadwalCollection;
use App\Interfaces\Repositories\JadwalRepositoryInterface as Repository;
use App\Models\Jadwal;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class JadwalController extends Controller
{
    protected $repository;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', [Jadwal::class]);
        $prodi = null;
        $user = auth()->user();
        if ($user->isMahasiswa()) $prodi = $user->mahasiswa->prodi_id;
        if ($user->isMahasiswa() && !$prodi)
            throw new AccessDeniedHttpException('This action is unauthorized.');

        $jadwal = $this->repository->all($prodi);
        return response()->json(new JadwalCollection($jadwal), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalFormRequest $request)
    {
        $this->authorize('create', [Jadwal::class]);
        $jadwal = $this->repository->create($request->validated());
        return response()->json(new JadwalCollection([$jadwal]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [Jadwal::class, $id]);
        $jadwal = $this->repository->byId($id);
        return response()->json(new JadwalCollection([$jadwal]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalFormRequest $request, $id)
    {
        $this->authorize('update', [Jadwal::class, $id]);
        $jadwal = $this->repository->update($request->validated(), $id);
        return response()->json(new JadwalCollection([$jadwal]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', [Jadwal::class, $id]);
        $this->repository->destroy($id);
        return response()->noContent();
    }
}
