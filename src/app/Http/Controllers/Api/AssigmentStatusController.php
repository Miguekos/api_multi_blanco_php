<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AssigmentStatusRepository;
use App\Http\Requests\AssigmentStatusRequest;
use Illuminate\Support\Facades\Auth;

class AssigmentStatusController extends Controller
{
    public function __construct(AssigmentStatusRepository $asssigmentStatusRepository)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->asssigmentStatusRepository = $asssigmentStatusRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assigment_statuses = $this->asssigmentStatusRepository->list();

        return response()->json([
            'assigment_statuses' => $assigment_statuses
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssigmentStatusRequest $request)
    {   
        $request->validated();

        $asssigment_status = $this->asssigmentStatusRepository->create($request->all());

        return response()->json(['message' => 'Assigment status created succesfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssigmentStatus  $asssigmentStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asssigment_status = $this->asssigmentStatusRepository->find($id);

        return response()->json([
            'asssigment_status' => $asssigment_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentStatus  $asssigmentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(AssigmentStatusRequest $request, $id)
    {
        $asssigment_status = $this->asssigmentStatusRepository->update($id, $request->all());

        return response()->json([
            'data'    => $asssigment_status,
            'message' => 'Success, asssigment status successfully updated.'
        ], '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentStatus  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->asssigmentStatusRepository->delete($id);

        return response()->json([
            'message' => 'Successfully deleted asssigment status'
        ], 201);
    }
}
