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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
	Route::get('/evento/{id}', [App\Http\Controllers\EventoController::class, 'index'])
	->name('evento.index');
	Route::post('/evento/create', [App\Http\Controllers\EventoController::class, 'store'])
	->name('evento.store');
	Route::post('/evento/show/', [App\Http\Controllers\EventoController::class, 'show'])
	->name('evento.show');
	Route::post('/evento/edit/{id}', [App\Http\Controllers\EventoController::class, 'edit'])
	->name('evento.edit');
	Route::post('/evento/update/{evento}', [App\Http\Controllers\EventoController::class, 'update'])
	->name('evento.update');
	Route::post('/evento/delete/{id}', [App\Http\Controllers\EventoController::class, 'destroy'])
	->name('evento.delete');
	});
//Route Hooks - Do not delete//
Route::view('users/', 'livewire.users.index')->name('users.index')->middleware('auth');
Route::view('roles/', 'livewire.roles.index')->name('roles.index')->middleware('auth');
Route::view('permissions/', 'livewire.permissions.index')->name('permissions.index')->middleware('auth');
Route::view('commonareas/', 'livewire.commonareas.index')->name('commonareas.index')->middleware('auth');


