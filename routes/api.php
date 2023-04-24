<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/ext/setUser', [PageController::class, 'setUser']);
Route::get('/ext/getUsers', [PageController::class, 'getUsers']);
Route::get('/ext/getUser/{search}', [PageController::class, 'getUser']);

Route::post('/ext/setMessage', [PageController::class, 'setItem']);
Route::get('/ext/getMessages', [PageController::class, 'getMessages']);

/*
Route::get('/ext/getItem/{search}', [PageController::class, 'getItem']);
Route::get('/ext/getItemsByCategory/{search}', [PageController::class, 'getItemsByCategory']);
Route::get('/ext/getCategoryByItem/{search}', [PageController::class, 'getCategoryByItem']);
*/