<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'show'])->whereNumber('company')->name('company.show');

Route::middleware('auth')->group(function () {
    Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('/companies/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->whereNumber('company')->name('company.edit');
    Route::patch('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->whereNumber('company')->name('company.update');
    Route::delete('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'destroy'])->whereNumber('company')->name('company.destroy');
});

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'show'])->whereNumber('employee')->name('employee.show');

Route::middleware('auth')->group(function () {
    Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{employee}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->whereNumber('employee')->name('employee.edit');
    Route::patch('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->whereNumber('employee')->name('employee.update');
    Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->whereNumber('employee')->name('employee.destroy');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
