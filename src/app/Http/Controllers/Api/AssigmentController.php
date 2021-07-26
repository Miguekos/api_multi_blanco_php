<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AssigmentRepository;
use App\Http\Requests\Assigment\CreateAssigmentRequest;
use App\Http\Requests\Assigment\UpdateAssigmentRequest;
use Illuminate\Support\Facades\Auth;

class AssigmentController extends Controller
{
    public function __construct(AssigmentRepository $assigmentRepository)
    {
        //$this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->assigmentRepository = $assigmentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->assigmentRepository->list();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->assigmentRepository->create($request->all());

        return $this->assigmentRepository->list();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assigment = $this->assigmentRepository->find($id);

        return response()->json([
            'assigment' => $assigment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->assigmentRepository->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->assigmentRepository->delete($id);

        return response()->json([
            'message' => 'Successfully deleted assigment'
        ], 201);
    }

    /**
     * Assign operator to the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignOperator(Request $request, $id)
    {
        $data = $this->assigmentRepository->assignOperator($request, $id);

        return response()->json([
            'message' => $data['message'],
            'assigment' => $data['assigment']
        ]);
    }
}
