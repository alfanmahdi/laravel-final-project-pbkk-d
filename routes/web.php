<?php

use App\Models\Song;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/song', function () {
    $songs = Song::with('artist')->get();
    return view('song', ['title' => 'Song']);
});
