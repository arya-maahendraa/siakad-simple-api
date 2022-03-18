<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FakultasRequest;
use App\Http\Resources\Fakultas\FakultasCollection;
use App\Interfaces\Repositories\FakultasRepositoryInterface as FakultasRepository;
use App\Models\Fakultas;

class FakultasContoller extends Controller
{
    protected $repository;
    public function __construct(FakultasRepository $repository)
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
        $this->authorize('viewAny', [Fakultas::class]);
        $fakultas = $this->repository->all();
        return response()->json(new FakultasCollection($fakultas), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FakultasRequest $request)
    {
        $this->authorize('create', [Fakultas::class]);
        $fakultas = $this->repository->create($request->validated());
        return response()->json(new FakultasCollection([$fakultas]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [Fakultas::class, $id]);
        $fakultas = $this->repository->byId((int)$id);
        return response()->json(new FakultasCollection([$fakultas]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FakultasRequest $request, $id)
    {
        $this->authorize('update', [Fakultas::class, $id]);
        $fakultas = $this->repository->update($request->validated(), $id);
        return response()->json(new FakultasCollection([$fakultas]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', [Fakultas::class, $id]);
        $this->repository->destroy($id);
        return response()->noContent();
    }
}
