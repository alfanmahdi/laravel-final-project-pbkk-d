<?php

namespace App\Http\Controllers;

use App\Models\Song;

class SongController extends Controller
{
    public function index()
    {
        return view('songs', ['title' => 'Your Music', 'songs' => Song::all()]);
    }

    public function show(Song $song)
    {
        return view('song', ['title' => 'Single', 'song' => $song]);
    }
}
