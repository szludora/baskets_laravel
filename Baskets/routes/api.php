<?php

use App\Http\Controllers\BasketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/baskets', [BasketController::class, 'index']);
Route::get('/baskets/{user_id}/{item_id}', [BasketController::class, 'show']);
Route::post('/baskets', [BasketController::class, 'store']);
Route::delete('/baskets/{user_id}/{item_id}', [BasketController::class, 'destroy']);
//  patch --> egyetlen egy, vagy nem az összes mező módosítása