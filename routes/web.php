<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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




// Route::resource('/', EmployeeController::class);
Route::get('/', [EmployeeController::class, 'index'])->name('employee.list'); 
Route::get('/employee/archive', [EmployeeController::class, 'archived'])->name('employee.archived'); 
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');  
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');  
Route::get('/employee/profile/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');  
Route::post('/employee/archive/{employee}', [EmployeeController::class, 'archive'])->name('employee.archive');    
Route::get('/employee/activity_log', [EmployeeController::class, 'activityLog'])->name('employee.log'); 


