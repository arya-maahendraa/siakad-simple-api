<?php

namespace App\Http\Controllers\Api;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFormRequest;
use App\Http\Resources\Admin\AdminCollection;
use App\Interfaces\Repositories\User\UserRepositoryInterface as Repository;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->repository->setRole(RoleEnum::Admin);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = $this->repository->all();
        return response()->json(new AdminCollection($admin), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFormRequest $request)
    {
        $admin = $this->repository->create($request->validated());
        return response()->json(new AdminCollection([$admin]), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = $this->repository->byId($id);
        return response()->json(new AdminCollection([$admin]), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFormRequest $request, $id)
    {
        $admin = $this->repository->update($request->validated(), $id);
        return response()->json(new AdminCollection([$admin]), 200);
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
        return response()->noContent();
    }
}
