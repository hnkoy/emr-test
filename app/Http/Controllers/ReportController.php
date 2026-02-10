<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Store a report sent log.
     */
    public function store(ReportRequest $request)
    {
      $validated = $request->validated();

        $report = Report::create($validated);

        return response()->json([
            'message' => 'Report log stored.',
            'data' => $report,
        ], 201);
    }

    /**
     * Check if report was sent for a given month and year.
     */
    public function wasSent(Request $request)
    {
        // $validated = $request->validate([
        //     'report_name' => ['required', 'string'],
        //     'report_month' => ['required', 'integer', 'between:1,12'],
        //     'report_year' => ['required', 'integer', 'between:2000,2100'],
        // ]);

        $exists = Report::query()
            ->where('report_name', $request->input('report_name'))
            ->where('report_month', $request->input('report_month'))
            ->where('report_year', $request->input('report_year'))
            ->exists();

        return response()->json([
            'sent' => $exists,
        ]);
    }
}
