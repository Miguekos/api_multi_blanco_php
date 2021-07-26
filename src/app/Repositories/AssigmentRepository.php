<?php

namespace App\Repositories;

use Auth;
use Carbon\Carbon;
use App\Models\Assigment;
use App\Models\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\AssigmentResource;
use App\Http\Resources\AssigmentCollection;

class AssigmentRepository
{
    /**
     * Get all Assigments
     *
     */
    public function list()
    {
        /*
        $start =  Carbon::now()->format('Y-m-d');
        $end =  Carbon::now()->addDays(30)->format('Y-m-d');

        $resources = User::join('assigments', 'users.id', '=', 'assigments.operator_id')
                        ->whereDate('assigments.start', '>=', $start)
                        ->whereDate('assigments.end', '<=', $end)
                        ->get();

        $users = new UserCollection($resources);
        */
        $users = new UserCollection(User::all());
        return $users;
    }

    /**
     * Create new Assigment
     *
     * @param $params
     * @return Assigment
     */
    public function create($data): Assigment
    {           
        return Assigment::create($data);
    }

    /**
     * Get an specific Assigment
     *
     * @param $id
     * @return Assigment|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return Assigment::findOrFail($id);
    }


    /**
     * Update Assigment
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $assigment = $this->find($id);
        $assigment->update($data);

        $users = new UserCollection(User::all());
        return $users;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $assigment = $this->find($id);
        return $assigment->delete();
    }


    /**
     * Assign operator to the assigment
     *
     * @return mixed
     */
    public function assignOperator(Request $request, string $id)
    {
        $assigment = $this->find($id);

        if ($request->has('operator_id')) {
            if ($request->operator_id == null || $request->operator_id == 'null') {
                $assigment->assignedOperator()->detach();
                $assigment->status_id = 1;

                $data['message'] = 'Successfully unassigned operator';
            } else {

                $operator = $this->userRepository->find($Request->operator_id);
                $assigment->assignedOperator()->detach();
                $assigment->assignedOperator()->attach($user);
                $assigment->status_id = 2;

                $data['message'] = 'Successfully assigned operator';
            }
        }

        $assigment->save();

        $data['assigment'] = $this->find($id);

        return $data;
    }
}