<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class ArtistController extends Controller
{
    public function show(Artist $artist)
    {
        return view('songs', ['title' => 'Music by ' . $artist->name, 'songs' => $artist->songs]);
    }
}
