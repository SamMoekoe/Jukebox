<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/genres', [GenreController::class, 'getGenres'])->name('genres');

Route::get('/genresongs/{id}', [GenreController::class, 'getGenreSongs']);

Route::get('/songdetail/{id}', [SongController::class, 'getSongDetails']);

Route::get('/playlists', [PlaylistController::class, 'getUserPlaylists'])->name('playlists');

require __DIR__.'/auth.php';
