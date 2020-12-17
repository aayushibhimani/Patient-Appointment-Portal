<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/doctor-dashboard', [App\Http\Controllers\DoctorsController::class, 'index'])->name('doctor-dashboard');
Route::get('/appointments', [App\Http\Controllers\DoctorsController::class, 'appointments'])->name('doctor-appointments');
Route::get('/my-patients', [App\Http\Controllers\DoctorsController::class, 'patients'])->name('doctor-patients');
Route::get('/doctor-profile-settings', [App\Http\Controllers\DoctorsController::class, 'profileSettings'])->name('doctor-profile-settings');







Route::get('/patient-dashboard', [App\Http\Controllers\PatientsController::class, 'index'])->name('patient-dashboard');
Route::get('/patient-view-invoice', [App\Http\Controllers\PatientsController::class, 'viewInvoice'])->name('patient-view-invoice');








Route::middleware(['auth','doctor'])->group(function(){
    Route::resource('doctor', 'App\Http\Controllers\DoctorsController');
});

Route::middleware(['auth','patient'])->group(function(){
    Route::resource('patient', 'App\Http\Controllers\PatientsController');
});