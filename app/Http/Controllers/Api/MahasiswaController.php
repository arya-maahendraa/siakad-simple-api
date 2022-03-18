<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaFormRequest;
use App\Http\Resources\Mahasiswa\MahasiswaCollection;
use App\Interfaces\Repositories\User\MahasiswaRepositoryInterface as Repository;
use App\Services\User\MahasiswaCUDService as Service;

class MahasiswaController extends Controller
{
    protected $repository;
    protected $service;
    public function __construct(Repository $repository, Service $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', [App\Models\Mahasiswa::class]);

        $dosen = null;
        if (auth()->user()->isDosen())
            $dosen = auth()->user()->dosen->id;

        $mahasiswa = $this->repository->all($dosen);
        return response()->json(new MahasiswaCollection($mahasiswa), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaFormRequest $request)
    {
        $this->authorize('create', [App\Models\Mahasiswa::class]);
        $mahasiswa = $this->service->create($request->validated());
        return response()->json(new MahasiswaCollection([$mahasiswa]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [App\Models\Mahasiswa::class, $id]);
        $mahasiswa = $this->repository->byId($id);
        return response()->json(new MahasiswaCollection([$mahasiswa]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MahasiswaFormRequest $request, $id)
    {
        $this->authorize('update', [App\Models\Mahasiswa::class]);
        $mahasiswa = $this->service->update($request->validated(), $id);
        return response()->json(new MahasiswaCollection([$mahasiswa]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
