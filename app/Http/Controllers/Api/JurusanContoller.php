<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanRequest;
use App\Http\Resources\Jurusan\JurusanCollection;
use App\Interfaces\Repositories\JurusanRepositoryInterface as JurusanRepository;
use App\Models\Jurusan;

class JurusanContoller extends Controller
{
    protected $repository;
    public function __construct(JurusanRepository $repository)
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
        $this->authorize('viewAny', [Jurusan::class]);
        $jurusan = $this->repository->all();
        return response()->json(new JurusanCollection($jurusan), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JurusanRequest $request)
    {
        $this->authorize('create', [Jurusan::class]);
        $jurusan = $this->repository->create($request->validated());
        return response()->json(new JurusanCollection([$jurusan]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [Jurusan::class, $id]);
        $jurusan = $this->repository->byId($id);
        return response()->json(new JurusanCollection([$jurusan]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JurusanRequest $request, $id)
    {
        $this->authorize('update', [Jurusan::class, $id]);
        $jurusan = $this->repository->update($request->validated(), $id);
        return response()->json(new JurusanCollection([$jurusan]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', [Jurusan::class, $id]);
        $this->repository->destroy($id);
        return response()->noContent();
    }
}
