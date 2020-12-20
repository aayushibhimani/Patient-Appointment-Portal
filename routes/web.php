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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Keeping in homeController as all type of users can change their password!
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');


//Route::get('/doctor-dashboard', [App\Http\Controllers\DoctorsController::class, 'index'])->name('doctor-dashboard');

//Route::get('/patient-dashboard', [App\Http\Controllers\PatientsController::class, 'index'])->name('patient-dashboard');
Route::get('/patient-view-invoice', [App\Http\Controllers\PatientsController::class, 'viewInvoice'])->name('patient-view-invoice');

Route::get('/checkout/{id}', [App\Http\Controllers\PatientsController::class, 'checkout'])->name('checkout');
Route::get('/payment-success', [App\Http\Controllers\PatientsController::class, 'paymentSuccess'])->name('payment-success');






Route::middleware(['auth','doctor'])->group(function(){
   Route::get('/appointments', [App\Http\Controllers\DoctorsController::class, 'appointments'])->name('doctor-appointments');
    Route::get('/my-patients', [App\Http\Controllers\DoctorsController::class, 'patients'])->name('doctor-patients');
    Route::get('/doctor-profile-settings', [App\Http\Controllers\DoctorsController::class, 'profileSettings'])->name('doctor-profile-settings');
    Route::get('/patient-profile', [App\Http\Controllers\DoctorsController::class, 'patientProfile'])->name('patient-profile');
    Route::get('/schedule-timings', [App\Http\Controllers\DoctorsController::class, 'scheduleTimings'])->name('schedule-timings');
    Route::post('/schedule-timings', [App\Http\Controllers\DoctorsController::class, 'createScheduleTimings'])->name('create-schedule-timings');
    Route::post('/schedule-timings', [App\Http\Controllers\DoctorsController::class, 'createScheduleTimings'])->name('create-schedule-timings');
    // Route::post('/doctor-profile-settings', [App\Http\Controllers\DoctorsController::class, 'store'])->name('store-settings');
    //Route::get('/doctor-profile-settings', [App\Http\Controllers\DoctorsController::class, 'show'])->name('show-settings');
    Route::post('/doctor-profile-settings', [App\Http\Controllers\DoctorsController::class, 'store'])->name('doctor-store-settings');
    Route::delete('/destroy/{id}', [App\Http\Controllers\DoctorsController::class, 'destroy'])->name('destroy');

    Route::put('/accept/{id}', [App\Http\Controllers\DoctorsController::class, 'accept'])->name('accept');
    Route::put('/reject/{id}', [App\Http\Controllers\DoctorsController::class, 'reject'])->name('reject');
});

Route::get('/search', [App\Http\Controllers\PatientsController::class, 'search'])->name('search');
Route::middleware(['auth','patient'])->group(function(){
    Route::get('/search', [App\Http\Controllers\PatientsController::class, 'search'])->name('search');
    Route::get('/patient-profile-settings', [App\Http\Controllers\PatientsController::class, 'profileSettings'])->name('patient-profile-settings');
    Route::post('/patient-profile-settings', [App\Http\Controllers\PatientsController::class, 'store'])->name('patient-store-settings');

    Route::get('/booking/{id}', [App\Http\Controllers\PatientsController::class, 'booking'])->name('booking');
    Route::post('/booking', [App\Http\Controllers\PatientsController::class, 'storeBooking'])->name('storeBooking');
    Route::get('/doctor-profile', [App\Http\Controllers\PatientsController::class, 'doctorProfile'])->name('doctor-profile');
});