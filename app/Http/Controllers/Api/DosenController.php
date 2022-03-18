<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DosenFormRequest;
use App\Http\Resources\Dosen\DosenCollection;
use App\Interfaces\Repositories\User\DosenRepositoryInterface as Repository;
use App\Models\Dosen;
use App\Services\User\DosenCUService as Service;

class DosenController extends Controller
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
        $this->authorize('viewAny', [Dosen::class]);
        $dosen = $this->repository->all();
        return response()->json(new DosenCollection($dosen), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenFormRequest $request)
    {
        $this->authorize('create', [Dosen::class]);
        $dosen = $this->service->create($request->validated());
        return response()->json(new DosenCollection([$dosen]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [Dosen::class, $id]);
        $dosen = $this->repository->byId($id);
        return response()->json(new DosenCollection([$dosen]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DosenFormRequest $request, $id)
    {
        $this->authorize('update', [Dosen::class, $id]);
        $dosen = $this->service->update($request->validated(), $id);
        return response()->json(new DosenCollection([$dosen]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', [Dosen::class, $id]);
        $this->repository->destroy($id);
        return response()->noContent();
    }
}
