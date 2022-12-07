<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pengguna/list-data', [App\Http\Controllers\pengguna::class, 'lihatdata']);
Route::get('/pengguna/ambil-data/{nip}', [App\Http\Controllers\pengguna::class, 'ambildata']);
Route::post('/pengguna/simpan', [App\Http\Controllers\pengguna::class, 'simpandata']);
Route::delete('/pengguna/delete/{nip}', [App\Http\Controllers\pengguna::class, 'hapusdata']);

Route::get('/petakehadiran/list-data', [App\Http\Controllers\PetaKehadiran::class, 'lihatdata']);
Route::get('/petakehadiran/ambil-data/{id}', [App\Http\Controllers\PetaKehadiran::class, 'ambildata']);
Route::post('/petakehadiran/simpan', [App\Http\Controllers\PetaKehadiran::class, 'simpandata']);
Route::delete('/petakehadiran/delete/{id}', [App\Http\Controllers\PetaKehadiran::class, 'hapusdata']);

Route::get('/presensiharian/list-data', [App\Http\Controllers\PresensiHarian::class, 'lihatdata']);
Route::get('/presensiharian/ambil-data/{id}', [App\Http\Controllers\PresensiHarian::class, 'ambildata']);
Route::post('/presensiharian/simpan', [App\Http\Controllers\PresensiHarian::class, 'simpandata']);
Route::delete('/presensiharian/delete/{id}', [App\Http\Controllers\PresensiHarian::class, 'hapusdata']);
