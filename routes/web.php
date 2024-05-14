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

use App\Http\Controllers\EventController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [EventController::class, 'index']); // Mostrar todos os registros 

Route::post('/events',[EventController::class, 'store']) ; // Para enviar os dados do banco 

Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); // Mostrar formulário para registro no banco

Route::get('/events/{id}', [EventController::class, 'show']); // Mostrar um dado especifico 

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth'); // middleware('auth') = usuário precisa está logado

Route::delete('/events/{id}', [EventController::class, 'destroy']);

Route::get('/events/edit/{id}', [EventController::class,'edit'])->middleware('auth');

Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');