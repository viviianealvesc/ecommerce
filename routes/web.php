<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('/');
Route::get('/events/create', [ShopController::class, 'create'])->name('events.create');
Route::post('/events', [ShopController::class, 'store']);
Route::get('/events/dashboard', [ShopController::class, 'dashboard'])->middleware('auth');
Route::get('/events/update/{id}', [ShopController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [ShopController::class, 'update'])->middleware('auth');
Route::delete('/events/{id}', [ShopController::class, 'destroy'])->middleware('auth');
Route::get('/events/cart', [ShopController::class, 'cart']);
Route::get('/events/carrinho/{id}', [ShopController::class, 'carrinho'])->middleware('auth');
Route::get('/events/carrinho', [ShopController::class, 'mostrarCarrinho']);
Route::get('/events/delete/{id}', [ShopController::class, 'delete']);
Route::get('/events/leave/{id}', [ShopController::class, 'favorito']);
Route::get('/events/favoritos/mostrar', [ShopController::class, 'productFav']);
Route::get('/events/product/{id}', [ShopController::class, 'show']);




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Auth::routes();

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
