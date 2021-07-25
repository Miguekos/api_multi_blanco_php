<?php

namespace App\Repositories;

use App\Models\AssigmentStatus;

class AssigmentStatusRepository
{
    /**
     * Get all AssigmentStatuss
     *
     */
    public function list()
    {
        return AssigmentStatus::all();
    }

    /**
     * Create new AssigmentStatus
     *
     * @param $params
     * @return AssigmentStatus
     */
    public function create($data): AssigmentStatus
    {
        return AssigmentStatus::create($data);
    }

    /**
     * Get an specific AssigmentStatus
     *
     * @param $id
     * @return AssigmentStatus|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return AssigmentStatus::findOrFail($id);
    }


    /**
     * Update AssigmentStatus
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $assigment_status = AssigmentStatus::findOrFail($id);
        $assigment_status->update($data);

        return $assigment_status;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete(string $id)
    {
        $assigment_status = AssigmentStatus::findOrFail($id);
        return $assigment_status->delete();
    }
}