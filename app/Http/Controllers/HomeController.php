<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;

class HomeController extends Controller
{
    public function index()
    {
        $totalSongs = Song::count();
        $totalPlaylists = Playlist::count();

        return view('home', [
            'title' => 'Spotifi',
            'totalSongs' => $totalSongs,
            'totalPlaylists' => $totalPlaylists,
        ]);
    }
}
