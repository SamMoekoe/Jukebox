<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\QueueController;


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

Route::get('/playlistname', function () {
    return view('playlistname');
});

Route::get('/playlistrename', function () {
    return view('playlistrename');
});


Route::get('/genres', [GenreController::class, 'getGenres'])->name('genres');

Route::get('/genresongs/{id}', [GenreController::class, 'getGenreSongs']);

Route::get('/songdetail/{id}', [SongController::class, 'getSongDetails']);

Route::get('/playlists', [PlaylistController::class, 'getUserPlaylists'])->name('playlists');

Route::get('/queue/{id}/add', [QueueController::class, 'add']);

Route::get('/queue/{id}/remove', [QueueController::class, 'remove']);

Route::get('/queue', [QueueController::class, 'getQueueSongs'])->name('queue');

Route::get('/playlistdetail/{id}', [PlaylistController::class, 'getPlaylistDetails']);

Route::get('/playlist/{id}/delete', [PlaylistController::class, 'deletePlaylist']);

Route::post('/playlist/create', [QueueController::class, 'create']);

Route::get('/selectplaylist', [PlaylistController::class, 'getAllPlaylists']);

Route::get('/store/{id}', [PlaylistController::class, 'storeSong']);

Route::post('/savesong', [PlaylistController::class, 'saveSong']);

Route::get('/deletesong/{id}', [PlaylistController::class, 'deleteSong']);

Route::get('/storename/{id}', [PlaylistController::class, 'storeName']);

Route::post('/savename', [PlaylistController::class, 'rename']);

require __DIR__.'/auth.php';
