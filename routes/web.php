<?php

use App\Http\Controllers\ClusterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('layouts.master');
});
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('clusters', ClusterController::class);
Route::resource('units', UnitController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('owners', OwnerController::class);
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
