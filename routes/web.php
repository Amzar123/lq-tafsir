<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\AyahController;
use App\Http\Controllers\TadaburController;
use Slim\Routing\RouteCollectorProxy;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('v1')->group(function () {
    Route::get('/surah', [SurahController::class, 'get']);

    Route::prefix('ayah')->group(function () {
        Route::get('/one/random', [AyahController::class, 'getOneRandom']);
        Route::post('/save', [AyahController::class, 'saveAyah']);
        Route::get('/one/{id}', [AyahController::class, 'getOneById']);
    });

    Route::prefix('tadabur')->middleware('web')->group(function () {
        Route::get('/one/{id}', [TadaburController::class, 'getOneById']);
        Route::post('/one', [TadaburController::class, 'create']);
    });
});
