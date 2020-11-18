<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::get('/characters', [CharacterController::class, 'index']);
    Route::get('/characters/random', [CharacterController::class, 'random']);

    Route::get('/episodes', [EpisodeController::class, 'index']);
    Route::get('/episodes/{id}', [EpisodeController::class, 'show']);

    Route::get('/quotes', [QuoteController::class, 'index']);
    Route::get('/quotes/random', [QuoteController::class, 'random']);

});

//    Route::get('/stats', [ApiRequestStats::class, 'allStats']);
//    Route::get('/my-stats', [ApiRequestStats::class, 'myStats']);
