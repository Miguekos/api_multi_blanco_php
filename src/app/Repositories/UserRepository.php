<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Get all Users
     *
     */
    public function list()
    {
        return User::all();
    }

    /**
     * Create new User
     *
     * @param $params
     * @return User
     */
    public function create($data): User
    {
        $user = User::create($data);
        //$user->assignRole($data->role);

        return $user;
    }

    /**
     * Get an specific User
     *
     * @param $id
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }


    /**
     * Update User
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);

        return $user;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}