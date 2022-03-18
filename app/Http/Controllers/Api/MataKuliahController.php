<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MataKuliahFormRequest;
use App\Http\Resources\MataKuliah\MataKuliahCollection;
use App\Interfaces\Repositories\MataKuliahRepositoryInterface as Repository;
use App\Models\MataKuliah;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class MataKuliahController extends Controller
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
        $this->authorize('viewAny', [MataKuliah::class]);
        $prodi = null;
        $user = auth()->user();
        if ($user->isMahasiswa()) $prodi = $user->mahasiswa->prodi_id;
        if ($user->isMahasiswa() && !$prodi)
            throw new AccessDeniedHttpException('This action is unauthorized.');
        $mk = $this->repository->all($prodi);
        return response()->json(new MataKuliahCollection($mk), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MataKuliahFormRequest $request)
    {
        $this->authorize('create', [MataKuliah::class]);
        $mk = $this->repository->create($request->validated());
        return response()->json(new MataKuliahCollection([$mk]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [MataKuliah::class]);
        $mk = $this->repository->byId($id);
        return response()->json(new MataKuliahCollection([$mk]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MataKuliahFormRequest $request, $id)
    {
        $mk = $this->repository->update($request->validated(), $id);
        return response()->json(new MataKuliahCollection([$mk]), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
