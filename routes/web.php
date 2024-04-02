<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('/');
Route::get('/events/create', [ShopController::class, 'create'])->name('events.create');
Route::post('/events', [ShopController::class, 'store']);
Route::get('/events/dashboard', [ShopController::class, 'dashboard']);
Route::get('/events/update/{id}', [ShopController::class, 'edit']);
Route::put('/update/{id}', [ShopController::class, 'update']);
Route::delete('/events/{id}', [ShopController::class, 'destroy']);



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
