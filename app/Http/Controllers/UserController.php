<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Str;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return $this->respondJson(true, 'Users retrieved successfully', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = User::create($request->all());
        return $this->respondJson(true, 'User created successfully', 201, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
        return $this->respondJson(true, 'User retrieved successfully', 200, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());
        return $this->respondJson(true, 'User updated successfully', 200, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return $this->respondJson(true, 'User deleted successfully', 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return $this->respondJson(
                false,
                'Validation Error',
                422,
                $validator->errors()
            );
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);

        $user = User::create($request->toArray());

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        $response = ['token' => $token, 'user' => $user];

        return $this->respondJson(true, 'User created successfully', 201, $response);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->respondJson(
                false,
                'Validation Error',
                422,
                $validator->errors()
            );
        }

        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return $this->respondJson(
                false,
                'Unauthorized',
                401
            );
        }

        $user = $request->user();

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        $response = ['token' => $token, 'user' => $user];

        return $this->respondJson(true, 'User logged in successfully', 200, $response);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->token()->revoke();
            return $this->respondJson(true, 'User logged out successfully', 200);
        }

        return $this->respondJson(false, 'No authenticated user', 401);
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        $user->load('ateliers', 'demands2ateliers');

        return $this->respondJson(true, 'User profile retrieved successfully', 200, $user);
    }
}
