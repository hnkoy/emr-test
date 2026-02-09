<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/patients/case-counts', [PatientController::class, 'countByCase']);
Route::post('/reports', [ReportController::class, 'store']);
Route::get('/reports/sent', [ReportController::class, 'wasSent']);
