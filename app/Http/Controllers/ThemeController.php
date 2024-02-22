<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Theme::all();
        return $this->respondJson(true, 'Themes retrieved successfully', 200, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Theme::create($request->all());
        return $this->respondJson(true, 'Theme created successfully', 201, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Theme::findOrFail($id);
        return $this->respondJson(true, 'Theme retrieved successfully', 200, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Theme::findOrFail($id);
        $data->update($request->all());
        return $this->respondJson(true, 'Theme updated successfully', 200, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Theme::findOrFail($id);
        $data->delete();
        return $this->respondJson(true, 'Theme deleted successfully', 200);
    }
}
