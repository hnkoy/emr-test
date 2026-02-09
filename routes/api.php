<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgregateDhs2Controller;

Route::post('/agregate-dhs2', [AgregateDhs2Controller::class, 'store']);
