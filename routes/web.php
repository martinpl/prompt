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
Route::get('/prompt/{command}', App\Http\Controllers\Prompt::class)->name('prompt');
Route::get('/action/{action}', App\Http\Controllers\ActionController::class)->name('action');
Route::view('/settings', 'components.settings')->name('settings');