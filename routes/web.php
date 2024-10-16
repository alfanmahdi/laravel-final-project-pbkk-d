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

Route::get('/songs/{song:slug}', function (Song $song) {
    return view('song', ['title' => 'Single', 'song' => $song]);
});

Route::get('/artists/{artist:username}', function (Artist $artist) {
    return view('songs', ['title' => 'Music by ' . $artist->name, 'songs' => $artist->songs]);
});

Route::get('/genres/{category:slug}', function (Category $category) {
    return view('songs', ['title' => 'Genre: ' . $category->name, 'songs' => $category->songs]);
});

Route::get('/playlists', function () {
    return view('playlists', ['title' => 'Your Playlists', 'playlists' => Playlist::all()]);
});

Route::get('/playlists/{playlist:slug}', function (Playlist $playlist) {
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

// Route untuk menambah lagu ke playlist
Route::post('/playlists/{playlist}/add-song', function (Request $request, Playlist $playlist) {
    // Validasi input
    $request->validate([
        'song_id' => 'required|exists:songs,id',
    ]);

    // Tambahkan lagu ke playlist (menghindari duplikat)
    $playlist->songs()->syncWithoutDetaching($request->input('song_id'));

    return redirect("/playlists/{$playlist->slug}")
        ->with('success', 'Song added to playlist successfully.');
})->name('playlists.add-song');

// Route to remove a song from a playlist
Route::delete('/playlists/{playlist}/remove-song/{song}', function (Playlist $playlist, Song $song) {
    // Remove the song from the playlist
    $playlist->songs()->detach($song->id);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Song removed from playlist successfully.');
})->name('playlists.remove-song');

// Route to update playlist description
Route::put('/playlists/{playlist}/update-description', function (Request $request, Playlist $playlist) {
    $request->validate([
        'description' => 'required|string|max:500', // Adjust max length as needed
    ]);

    // Update the description
    $playlist->description = $request->input('description');
    $playlist->save();

    return redirect()->back()->with('success', 'Description updated successfully.');
})->name('playlists.update-description');