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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//home

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirect'])->name('redirect.home');

Route::post('appointment.create', [App\Http\Controllers\HomeController::class, 'create'])->name('appointment.create');

Route::get('appointment.show', [App\Http\Controllers\HomeController::class, 'show'])->name('appointment.show');

Route::get('appointment.cancel/{id}', [App\Http\Controllers\HomeController::class, 'cancel'])->name('appointment.cancel');


//admin

Route::get('doctor.create', [App\Http\Controllers\AdminController::class, 'create'])->name('doctor.create');

Route::post('doctor.store', [App\Http\Controllers\AdminController::class, 'store'])->name('doctor.store');

Route::get('show.appointment', [App\Http\Controllers\AdminController::class, 'show'])->name('show.appointment');

Route::get('approved.patient/{id}', [App\Http\Controllers\AdminController::class, 'approved'])->name('approved.patient');

Route::get('canceled.patient/{id}', [App\Http\Controllers\AdminController::class, 'canceled'])->name('canceled.patient');

Route::get('show.doctors', [App\Http\Controllers\AdminController::class, 'showd'])->name('show.doctors');

Route::get('delete.doctor/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete.doctor');

Route::get('update.doctor/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update.doctor');

Route::post( 'edit.doctor/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit.doctor');



