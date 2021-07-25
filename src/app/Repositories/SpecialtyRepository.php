<?php

namespace App\Repositories;

use App\Models\Specialty;

class SpecialtyRepository
{
    /**
     * Get all Specialtys
     *
     */
    public function list()
    {
        return Specialty::all();
    }

    /**
     * Create new Specialty
     *
     * @param $params
     * @return Specialty
     */
    public function create($data): Specialty
    {
        return Specialty::create($data);
    }

    /**
     * Get an specific Specialty
     *
     * @param $id
     * @return Specialty|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return Specialty::findOrFail($id);
    }


    /**
     * Update Specialty
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->update($data);

        return $specialty;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete(string $id)
    {
        $Specialty = Specialty::findOrFail($id);
        return $Specialty->delete();
    }
}