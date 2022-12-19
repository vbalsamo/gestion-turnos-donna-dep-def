<?php

use App\Http\Controllers\LoginController;
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
Route::view('/', 'home')->name('/');
Route::view('home', 'home')->name('home');
Route::resource('tratamientos', \App\Http\Controllers\TratamientoController::class);
Route::resource('locaciones', \App\Http\Controllers\LocacionController::class);
Route::resource('login', \App\Http\Controllers\LoginController::class)
->only(['index', 'store']);
Route::post('logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');
Route::resource('register', \App\Http\Controllers\RegisterController::class);
Route::resource('password', \App\Http\Controllers\PasswordController::class);
Route::resource('menu', \App\Http\Controllers\MenuController::class);
Route::resource('profesionales', \App\Http\Controllers\ProfesionalController::class);
Route::resource('calendarioSelect', \App\Http\Controllers\CalendarioController::class);
Route::post('filter', [\App\Http\Controllers\CalendarioController::class, 'show'])->name('filter');
Route::post('turnoShow', [\App\Http\Controllers\TurnoController::class, 'show'])->name('turnoShow');
Route::resource('turnos', \App\Http\Controllers\TurnoController::class);
Route::resource('turnosAdmin', \App\Http\Controllers\TurnosAdminController::class);
