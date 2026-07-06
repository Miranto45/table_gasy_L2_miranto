<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TableController::class, 'index'])->name('home');

Route::resource('tables', TableController::class)->except(['show']);
Route::post('tables/{table}/statut', [TableController::class, 'changeStatut'])->name('tables.statut');

Route::resource('zones', ZoneController::class)->except(['show']);
Route::resource('clients', ClientController::class)->except(['show']);
Route::resource('reservations', ReservationController::class)->except(['show', 'edit', 'update']);
