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







Route::get('/patient-dashboard', [App\Http\Controllers\PatientsController::class, 'index'])->name('patient-dashboard');








Route::middleware(['auth','doctor'])->group(function(){
    Route::resource('doctor', 'App\Http\Controllers\DoctorsController');
});

Route::middleware(['auth','patient'])->group(function(){
    Route::resource('patient', 'App\Http\Controllers\PatientsController');
});