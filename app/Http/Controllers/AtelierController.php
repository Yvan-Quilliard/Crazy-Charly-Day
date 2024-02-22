<?php

namespace App\Http\Controllers;

use App\Http\Requests\Atelier\StoreAtelierRequest;
use App\Http\Requests\Atelier\UpdateAtelierRequest;
use App\Models\Atelier;

class AtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Atelier::with( 'users')->get();
        return $this->respondJson(true, 'Ateliers retrieved successfully', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtelierRequest $request)
    {
        $data = Atelier::create($request->all());
        return $this->respondJson(true, 'Atelier created successfully', 201, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Atelier::with( 'users')->findOrFail($id);
        return $this->respondJson(true, 'Atelier retrieved successfully', 200, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtelierRequest $request, string $id)
    {
        $data = Atelier::findOrFail($id);
        $data->update($request->all());
        return $this->respondJson(true, 'Atelier updated successfully', 200, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Atelier::findOrFail($id);
        $data->delete();
        return $this->respondJson(true, 'Atelier deleted successfully', 200);
    }

    public function participate(string $id)
    {
        $atelier = Atelier::findOrFail($id);
        $user = auth()->user();
        $atelier->users()->attach($user);
        return $this->respondJson(true, 'User participated successfully', 200);
    }
}
