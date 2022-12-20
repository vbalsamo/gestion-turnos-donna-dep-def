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
Route::resource('tratamientos', \App\Http\Controllers\TratamientoController::class)->middleware('auth')->middleware('can:adminAuth');
Route::resource('locaciones', \App\Http\Controllers\LocacionController::class)->middleware('auth')->middleware('can:adminAuth');
Route::resource('login', \App\Http\Controllers\LoginController::class)->name('*', 'login')
->only(['index', 'store']);
Route::post('logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');
Route::resource('register', \App\Http\Controllers\RegisterController::class);
Route::resource('password', \App\Http\Controllers\PasswordController::class)->middleware('auth')->middleware('can:adminAuth');
Route::resource('menu', \App\Http\Controllers\MenuController::class);
Route::resource('profesionales', \App\Http\Controllers\ProfesionalController::class)->middleware('auth')->middleware('can:adminAuth');
Route::resource('calendarioSelect', \App\Http\Controllers\CalendarioController::class);
Route::post('filter', [\App\Http\Controllers\CalendarioController::class, 'show'])->name('filter');
Route::post('turnos.elegirHorario', [\App\Http\Controllers\TurnoController::class, 'elegirHorario'])->name('turnos.elegirHorario');
Route::post('turnos.horariosLibres', [\App\Http\Controllers\TurnoController::class, 'horariosLibres'])->name('turnos.horariosLibres');
Route::post('turnoShow', [\App\Http\Controllers\TurnoController::class, 'show'])->name('turnoShow');
Route::resource('turnos', \App\Http\Controllers\TurnoController::class);
Route::resource('turnosAdmin', \App\Http\Controllers\TurnosAdminController::class)->middleware('auth')->middleware('can:adminAuth');
Route::post('turnos.mostrarTurnos', [\App\Http\Controllers\TurnoController::class, 'mostrarTurnos'])->name('turnos.mostrarTurnos');
Route::view('panelAdmin', 'menu_admin')->name('panelAdmin');