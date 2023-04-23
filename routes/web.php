<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;

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

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/add-patient', [PatientController::class, 'add_patient'])->name('add');
    Route::post('/add-request', [PatientController::class, 'add_request'])->name('add-request');
    Route::get('/list-patient', [PatientController::class, 'list_patient'])->name('list');
    Route::get('/update-patient/{id}', [PatientController::class, 'update_patient'])->name('update');
    Route::post('/update-request', [PatientController::class, 'update_request'])->name('update-request');
    Route::get('/delete-patient/{id}', [PatientController::class, 'delete_request'])->name('delete-request');
    Route::get('list-patient/search', [PatientController::class, 'search_request'])->name('search-request');
});




Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot_password_request'])->name('forgot-password-request');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset_password'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset_password_request'])->name('reset-password-request');




