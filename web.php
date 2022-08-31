<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleitorController;


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

Route::get('/urna', [PeriodoController::class, 'index']);
Route::get('/urna/{id}/periodoshow', [PeriodoController::class, 'showperiodo'])->where('id','[0-9]+');
Route::get('/urna/periodocreate', [PeriodoController::class, 'createperiodo']);
Route::post('/urna/periodostore', [PeriodoController::class, 'periodostore']);
Route::get('/urna/{id}/periodoedit', [PeriodoController::class, 'editperiodo']);
Route::post('/urna/periodoupdate', [PeriodoController::class, 'updateperiodo']);
Route::get('/urna/{id}/periododestroy', [PeriodoController::class, 'destroyperiodo']);

Route::get('/urna/{id}/eleitorshow', [EleitorController::class, 'showeleitor'])->where('id','[0-9]+');
Route::get('/urna/eleitorcreate', [EleitorController::class, 'createeleitor']);
Route::post('/urna/eleitorstore', [EleitorController::class, 'storeeleitor']);
Route::get('/urna/{id}/eleitoredit', [EleitorController::class, 'editeleitor']);
Route::post('/urna/eleitorupdate', [EleitorController::class, 'updateeleitor']);
Route::get('/urna/{id}/eleitordestroy', [EleitorController::class, 'destroyeleitor']);

Route::get('/urna/{id}/candidatoshow', [CandidatoController::class, 'showcandidato'])->where('id','[0-9]+');
Route::get('/urna/candidatocreate', [CandidatoController::class, 'createcandidato']);
Route::post('/urna/candidatostore', [CandidatoController::class, 'storecandidato']);
Route::get('/urna/{id}/candidatoedit', [CandidatoController::class, 'editcandidato']);
Route::post('/urna/candidatoupdate', [CandidatoController::class, 'updatecandidato']);
Route::get('/urna/{id}/candidatodestroy', [CandidatoController::class, 'destroycandidato']);

Route::get('/urna/formaluno', [UrnaController::class, 'formaluno']);

Route::get('/urna/createform', [UrnaController::class, 'create']);
Route::post('/urna/store', [UrnaController::class, 'store']);