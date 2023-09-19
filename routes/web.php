<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
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
        Route::get('/one', [SurahController::class, 'get']);
        Route::get('/one/random', [SurahController::class, 'get']);
    });
    // Route::get('/surah/{number}', [SurahController::class, 'getByNumber']);
    // Route::get('/surah/{number}/{edition}', [SurahController::class, 'getOneByNumberAndEdition']);
    // Route::get('/surah/{number}/editions/{editions}', [SurahController::class, 'getManyByNumberAndEdition']);
});
