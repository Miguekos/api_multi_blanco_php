<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        //$this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->list();

        return response()->json([
            'users' => $users
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $request->validated();
        $data = $request->all();
        $data['password'] = bcrypt(123456);
        $data['colorPair'] = isset($data['colorPair']) ? $data['colorPair'] : '{
                                "dark": "rgb(11, 209, 171,0.8)",
                                "light": "rgb(11, 209, 171,0.1)"
                            }';

        $user = $this->userRepository->create($data);

        switch ($data['role_id']) {
            case 1:
                $user->assignRole('admin');
                break;
            case 2:
                $user->assignRole('processor');
                break;
            case 3:
                $user->assignRole('operator');
                break;
            default:
                break;
        }
        

        return response()->json(['message' => 'User created succesfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->update($id, $request->all());

        return response()->json([
            'data'    => $user,
            'message' => 'Success, user successfully updated.'
        ], '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return response()->json([
            'message' => 'Successfully deleted user'
        ], 201);
    }
}
