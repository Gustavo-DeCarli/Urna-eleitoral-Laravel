<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrnaController;

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

Route::get('/urna', [UrnaController::class, 'index']);
Route::get('/urna/{id}/periodoshow', [UrnaController::class, 'showperiodo'])->where('id','[0-9]+');
Route::get('/urna/periodocreate', [UrnaController::class, 'createperiodo']);
Route::post('/urna/periodostore', [UrnaController::class, 'periodostore']);
Route::get('/urna/{id}/periodosedit', [UrnaController::class, 'editperiodo']);
Route::post('/urna/periodoupdate', [UrnaController::class, 'updateperiodo']);
Route::get('/urna/{id}/periododestroy', [UrnaController::class, 'destroyperiodo']);

Route::get('/urna/{id}/eleitorshow', [UrnaController::class, 'showeleitor'])->where('id','[0-9]+');
Route::get('/urna/eleitorcreate', [UrnaController::class, 'createeleitor']);
Route::post('/urna/eleitorstore', [UrnaController::class, 'storeeleitor']);
Route::get('/urna/{id}/eleitoredit', [UrnaController::class, 'editeleitor']);
Route::post('/urna/eleitorupdate', [UrnaController::class, 'updateeleitor']);
Route::get('/urna/{id}/eleitordestroy', [UrnaController::class, 'destroyeleitor']);

Route::get('/urna/{id}/candidatoshow', [UrnaController::class, 'showcandidato'])->where('id','[0-9]+');
Route::get('/urna/candidatocreate', [UrnaController::class, 'createcandidato']);
Route::post('/urna/candidatostore', [UrnaController::class, 'storecandidato']);
Route::get('/urna/{id}/candidatoedit', [UrnaController::class, 'editcandidato']);
Route::post('/urna/candidatoupdate', [UrnaController::class, 'updatecandidato']);
Route::get('/urna/{id}/candidatodestroy', [UrnaController::class, 'destroycandidato']);

Route::get('/urna/formaluno', [UrnaController::class, 'formaluno']);

Route::get('/urna/createform', [UrnaController::class, 'create']);
Route::post('/urna/store', [UrnaController::class, 'store']);