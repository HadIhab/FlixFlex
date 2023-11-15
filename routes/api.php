<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;

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


Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/top', [MovieController::class, 'getTopMovies']);

Route::get('/series', [SerieController::class, 'index']);
Route::get('/series/top', [SerieController::class, 'getTopSeries']);

Route::get('/search', [SearchController::class, 'search']);
Route::get('/movies/{id}', [DetailController::class, 'showMovie']);
Route::get('/series/{id}', [DetailController::class, 'showSeries']);

// Favorites routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/favorites/movies/{movieId}', [FavoriteController::class, 'addMovie']);
    Route::delete('/favorites/movies/{movieId}', [FavoriteController::class, 'removeMovie']);

    Route::post('/favorites/series/{seriesId}', [FavoriteController::class, 'addSeries']);
    Route::delete('/favorites/series/{seriesId}', [FavoriteController::class, 'removeSeries']);

    Route::get('/favorites', [FavoriteController::class, 'getFavorites']);
});

