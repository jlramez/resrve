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
//Route Hooks - Do not delete//
Route::view('users/', 'livewire.users.index')->name('users.index')->middleware('auth');
Route::view('roles/', 'livewire.roles.index')->name('roles.index')->middleware('auth');
Route::view('permissions/', 'livewire.permissions.index')->name('permissions.index')->middleware('auth');
Route::view('commonareas/', 'livewire.commonareas.index')->name('commonareas.index')->middleware('auth');


