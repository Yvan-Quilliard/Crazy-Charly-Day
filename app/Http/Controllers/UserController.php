<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
    public function update(Request $request, string $id)
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
}
