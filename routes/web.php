<?php

use App\Models\Artist;
use App\Models\Category;
use App\Models\Song;
use App\Models\Songs;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/songs', function () {
    return view('songs', ['title' => 'Songs', 'songs' => Song::all()]);
});

Route::get('/songs/{song:slug}', function(Song $song) {
    return view('song', ['title' => 'Song', 'song' => $song]);
});

Route::get('/artists/{artist:username}', function(Artist $artist) {
    return view('songs', ['title' => 'Songs by ' . $artist->name, 'songs' => $artist->songs]);
});

Route::get('/genres/{category:slug}', function(Category $category) {
    return view('songs', ['title' => 'Genre Music: ' . $category->name, 'songs' => $category->songs]);
});