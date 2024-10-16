<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-5 sm:py-5">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $playlist->name }}
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Updated {{ $playlist->created_at->diffForHumans() }}
                </p>
            </div>

            {{-- Daftar Lagu dalam Playlist --}}
            <h3 class="text-xl font-semibold mt-6">Songs in this Playlist:</h3>
            <ul class="mt-4">
                @forelse ($playlist->songs as $song)
                    <li class="mb-2">{{ $song->title }} by {{ $song->artist->name }}</li>
                @empty
                    <li>No songs in this playlist yet.</li>
                @endforelse
            </ul>

            {{-- Form untuk Menambah Lagu ke Playlist --}}
            <div class="mt-6">
                <h3 class="text-xl font-semibold">Add a Song to Playlist</h3>

                <form action="{{ route('playlists.add-song', $playlist) }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="song_id" class="block text-sm font-medium text-gray-700">Select Song:</label>
                        <select name="song_id" id="song_id" class="mt-1 block w-full border-gray-300 rounded-md">
                            @foreach (\App\Models\Song::all() as $song)
                                <option value="{{ $song->id }}">{{ $song->title }} by {{ $song->artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Add Song
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-layout>


{{-- <div class="bg-white py-5 sm:py-5">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Your Playlist
                    </h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">
                        Enjoy your playlist
                    </p>
                </div>

                <div
                    class="mx-auto mt-2 pt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-2 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $playlist->created_at }}" class="text-gray-500">
                                Updated {{ $playlist->created_at->diffForHumans() }}
                            </time>
                        </div>
                        <div class="group relative">
                            <h3
                                class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 hover:underline">
                                <a href="/playlists/{{ $playlist['slug'] }}">
                                    {{ $playlist->name }}
                                </a>
                            </h3>
                        </div>
                    </article>
                </div>
            </div>
        </div> --}}
