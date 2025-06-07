<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleServiceController;

Route::get('/', function () { return view('app'); });

Route::apiResource('/schedule-services', ScheduleServiceController::class);


