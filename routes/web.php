<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/{song:slug}', [SongController::class, 'show'])->name('songs.show');

Route::get('/artists/{artist:username}', [ArtistController::class, 'show'])->name('artists.show');

Route::get('/genres/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/{playlist:slug}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::post('/playlists/{playlist}/add-song', [PlaylistController::class, 'addSong'])->name('playlists.add-song');
Route::delete('/playlists/{playlist}/remove-song/{song}', [PlaylistController::class, 'removeSong'])->name('playlists.remove-song');
Route::put('/playlists/{playlist}/update-description', [PlaylistController::class, 'updateDescription'])->name('playlists.update-description');
