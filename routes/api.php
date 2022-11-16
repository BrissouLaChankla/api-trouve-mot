<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WordController;
use App\Http\Controllers\API\CategorieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::controller(WordController::class)->group(function () {
    Route::get('/random/{number?}', 'getRandomWords');
    Route::get('/startwith/{letter}/{number?}', 'getWordsByLetter');
    Route::get('/daily', 'getDailyWord');
    Route::get('/weekly', 'getWeeklyWord');
    Route::get('/monthly', 'getMonthlyWord');
    // Route::get('/all', 'getAllWords');
    Route::get('/{parameter}/{sizenb}/{number?}', 'getWordsBySize');
});

Route::controller(CategorieController::class)->group(function () {
    Route::get('/categorie/{id_categorie}/{number?}', 'getWordsByCategorie');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
