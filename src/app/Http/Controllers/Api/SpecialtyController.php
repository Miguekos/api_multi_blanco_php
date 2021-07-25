<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SpecialtyRepository;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Support\Facades\Auth;

class SpecialtyController extends Controller
{
    public function __construct(SpecialtyRepository $specialtyRepository)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->specialtyRepository = $specialtyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = $this->specialtyRepository->list();

        return response()->json([
            'specialties' => $specialties
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {   
        $request->validated();

        $specialty = $this->specialtyRepository->create($request->all());

        return response()->json(['message' => 'Specialty created succesfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialty = $this->specialtyRepository->find($id);

        return response()->json([
            'specialty' => $specialty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyRequest $request, $id)
    {
        $specialty = $this->specialtyRepository->update($id, $request->all());

        return response()->json([
            'data'    => $specialty,
            'message' => 'Success, specialty successfully updated.'
        ], '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->specialtyRepository->delete($id);

        return response()->json([
            'message' => 'Successfully deleted specialty'
        ], 201);
    }
}
