<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/patients/case-counts', [PatientController::class, 'countByCase']);
