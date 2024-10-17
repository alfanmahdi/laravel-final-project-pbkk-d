<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('playlists', ['title' => 'Your Playlists', 'playlists' => Playlist::all()]);
    }

    public function show(Playlist $playlist)
    {
        return view('playlist', ['title' => 'Playlist', 'playlist' => $playlist]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $playlist = new Playlist();
        $playlist->name = $request->input('name');
        $playlist->slug = Str::slug($request->input('name'));
        $playlist->save();

        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully.');
    }

    public function addSong(Request $request, Playlist $playlist)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        $playlist->songs()->syncWithoutDetaching($request->input('song_id'));
        $playlist->touch();

        return redirect()->route('playlists.show', $playlist->slug)->with('success', 'Song added to playlist successfully.');
    }

    public function removeSong(Playlist $playlist, Song $song)
    {
        $playlist->songs()->detach($song->id);
        $playlist->touch();
        return redirect()->back()->with('success', 'Song removed from playlist successfully.');
    }

    public function updateDescription(Request $request, Playlist $playlist)
    {
        $request->validate([
            'description' => 'required|string|max:500',
        ]);

        $playlist->description = $request->input('description');
        $playlist->touch();
        $playlist->save();

        return redirect()->back()->with('success', 'Description updated successfully.');
    }
}
