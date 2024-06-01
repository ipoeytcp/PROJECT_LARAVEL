<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KritikController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'utama'] );

Route::get('/form', [AuthController::class, 'register']);

Route::post('/welcome', [AuthController::class, 'welcome']);

Route::get('/data-table', function(){
    return view('page.data-table');
});

Route::get('/table', function(){
    return view('page.table');
});

Route::middleware(['auth'])->group(function () {

//GENRE
//CREATE
//Form tambah genre
Route::get('/genre/creategenre', [GenreController::class, 'creategenre']);
//UNtuk Kirim data ke database tabel genre
Route::post('genre', [GenreController::class, 'storegenre']);

//READ
//Tampil Semua Data Genre
Route::get('/genre', [GenreController::class, 'indexgenre']);
//Tampil Detail Genre
Route::get('/genre/{genre_id}', [GenreController::class, 'showgenre']);

//UPDATE
//Form Update genre
Route::get('/genre/{genre_id}/edit', [GenreController::class, 'editgenre']);
//Update data genre ke database berdsarakan ID
Route::put('/genre/{genre_id}', [GenreController::class, 'updategenre']);

//DELETE
//Delete data genre berdsarakan ID
Route::delete('/genre/{genre_id}', [GenreController::class, 'destroygenre']);

//CRUD_CAST

//CREATE
//Form tambah cast
Route::get('/cast/create', [CastController::class, 'create']);
//UNtuk Kirim data ke database tabel CAST
Route::post('cast', [CastController::class, 'store']);

//READ
//Tampil Semua Data Cast
Route::get('/cast', [CastController::class, 'index']);
//Tampil Detail Cast
Route::get('/cast/{cast_id}', [CastController::class, 'show']);

//UPDATE
//Form Update Cast
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
//Update data Cast ke database berdsarakan ID
Route::put('/cast/{cast_id}', [CastController::class, 'update']);

//DELETE
//Delete data cast berdsarakan ID
Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);

//Profile
Route::resource('profile', ProfileController::class)->only(['index','update']);

//Kritik
Route::post('kritik/{film_id}', [KritikController::class, 'tambah']);


});








//crud FILM
Route::resource('film', FilmController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
