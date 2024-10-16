<?php

use App\Models\Song;
use App\Models\Songs;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

// Route to handle new playlist form submission
Route::post('/playlists', function (Request $request) {
    // Validate the form input
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Create new playlist and generate slug
    $playlist = new Playlist();
    $playlist->name = $request->input('name');
    $playlist->slug = Str::slug($request->input('name'));
    $playlist->save();

    // Redirect back with success message
    return redirect('/playlists')->with('success', 'Playlist created successfully.');
})->name('playlists.store');