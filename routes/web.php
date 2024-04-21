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

Route::get('/', App\Livewire\Commands::class)->name('commands');
Route::get('/thing/{command}', App\Http\Controllers\Thing::class)->name('thing');
Route::get('/action/{action}', App\Http\Controllers\ActionController::class)->name('action');
Route::view('/settings', 'components.settings')->name('settings');