<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeaveApproverController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WaterController;
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
Route::get('/', [LoginController::class, "login"])->name("login");
Route::post('/authenticate', [LoginController::class, "authenticate"])->name("authenticate");
Route::prefix("/admin")->middleware("auth")->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('clusters', ClusterController::class);
    Route::resource('units', UnitController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('tenants', TenantController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('banks', BankController::class);
    Route::resource('accounts', AccountController::class);
    Route::resource('entries', CashflowController::class);
    Route::resource('leaves', LeaveController::class);
    Route::resource('leave-types', LeaveTypeController::class);
    Route::resource('leave-approvers', LeaveApproverController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('waters', WaterController::class);
    Route::resource('electrics', ElectricController::class);
    Route::post('owners/grant-portal/{owner}', [OwnerController::class, 'grantAccess'])->name('owners.grant-portal');
    Route::post('tenants/grant-portal/{tenant}', [TenantController::class, 'grantAccess'])->name('tenants.grant-portal');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');    
});

