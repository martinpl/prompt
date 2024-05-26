<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Commands::class)->name('commands');
Route::get('/prompt/{command}', App\Http\Controllers\Prompt::class)->name('prompt');
Route::get('/action/{action}', App\Http\Controllers\ActionController::class)->name('action');
Route::view('/settings', 'components.settings')->name('settings');
