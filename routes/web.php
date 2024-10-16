<?php

use App\Models\Song;
use App\Models\Songs;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Spotifi']);
});

Route::get('/songs', function () {
    return view('songs', ['title' => 'Your Music', 'songs' => Song::all()]);
});

Route::get('/songs/{song:slug}', function(Song $song) {
    return view('song', ['title' => 'Single', 'song' => $song]);
});

Route::get('/artists/{artist:username}', function(Artist $artist) {
    return view('songs', ['title' => 'Music by ' . $artist->name, 'songs' => $artist->songs]);
});

Route::get('/genres/{category:slug}', function(Category $category) {
    return view('songs', ['title' => 'Genre: ' . $category->name, 'songs' => $category->songs]);
});

Route::get('/playlists', function() {
    return view('playlists', ['title' => 'Your Playlists', 'playlists' => Playlist::all()]);
});

Route::get('/playlists/{playlist:slug}', function(Playlist $playlist) {
    return view('playlist', ['title' => 'Playlist', 'playlist' => $playlist]);
});