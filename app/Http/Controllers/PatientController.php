<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Return counts of patients by case.
     */
    public function countByCase()
    {
        $cases = [
            'SUSPECTED_MALARIA',
            'TESTED_MALARIA',
            'CONFIRMED_MALARIA',
            'MALARIA_DEATHS',
        ];

        $counts = Patient::query()
            ->select('case', DB::raw('count(*) as total'))
            ->whereIn('case', $cases)
            ->groupBy('case')
            ->pluck('total', 'case');

        $data = collect($cases)->mapWithKeys(function (string $case) use ($counts) {
            return [$case => (int) ($counts[$case] ?? 0)];
        });

        return response()->json([
            'facility_id' => config('app.name'),
            'reportDate' => now()->toDateString(),
            'reportType' => 'MALARIA_MONTHLY',
            'data' => $data,
        ]);
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
    public function store(Request $request)
    {
        //
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
