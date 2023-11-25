<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\RehearsalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/calendar/{year}/{month}', [CalendarController::class, 'getCalendar']);
Route::get('/events/{year}/{month}', [CalendarController::class, 'getEvents']);

Route::post('/availability/create', [AvailabilityController::class, 'create']);
Route::post('/rehearsal/create', [RehearsalController::class, 'create']);
Route::post('/gig/create', [GigController::class, 'create']);
