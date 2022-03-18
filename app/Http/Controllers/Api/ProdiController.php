<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdiRequest;
use App\Http\Resources\Prodi\ProdiCollection;
use App\Interfaces\Repositories\ProdiRepositoryInterface as Repository;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

class ProdiController extends Controller
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
        $this->authorize('viewAny', [Prodi::class]);
        $jurusan = null;
        if (Auth::user()->isDosen())
            $jurusan = Auth::user()->dosen->jurusan_id;
        $prodi = $this->repository->all($jurusan);
        return response()->json(new ProdiCollection($prodi), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdiRequest $request)
    {
        $this->authorize('create', [Prodi::class]);
        $prodi = $this->repository->create($request->validated());
        return response()->json(new ProdiCollection([$prodi]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [Prodi::class, $id]);
        $prodi = $this->repository->byId($id);
        return response()->json(new ProdiCollection([$prodi]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdiRequest $request, $id)
    {
        $this->authorize('update', [Prodi::class, $id]);
        $prodi = $this->repository->update($request->validated(), $id);
        return response()->json(new ProdiCollection([$prodi]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', [Prodi::class, $id]);
        $this->repository->destroy($id);
        return response()->noContent();
    }
}
