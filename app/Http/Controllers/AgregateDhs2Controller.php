<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgregateDhs2Request;
use App\Models\AgregateDhs2;
use Illuminate\Http\Request;

class AgregateDhs2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgregateDhs2Request $request)
    {
        $validated = $request->validated();

        $record = AgregateDhs2::create($validated);

        return response()->json([
            'message' => 'Agregate DHS2 stored successfully.',
            'data' => $record,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
