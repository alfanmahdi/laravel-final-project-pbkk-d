<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-5 sm:py-5">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Playlists
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Explore favorite playlists
                </p>
                <button id="createPlaylistBtn" class="mt-4 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                    Create New Playlist
                </button>
                <div id="newPlaylistForm" class="mt-4 hidden">
                    <form action="{{ route('playlists.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="playlistName" class="block text-gray-900 font-bold mb-2">Playlist Name:</label>
                            <input type="text" name="name" id="playlistName" class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" class="mt-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                                Save Playlist
                            </button>
                            <button type="button" id="cancelBtn" class="mt-2 bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div
                class="mx-auto mt-2 pt-4 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 sm:mt-2 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($playlists as $playlist)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $playlist->updated_at }}" class="text-gray-500">
                                Updated {{ $playlist->updated_at->diffForHumans() }}
                            </time>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 hover:underline">
                                <a href="/playlists/{{ $playlist->slug }}">
                                    {{ $playlist->name }}
                                </a>
                            </h3>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.getElementById('createPlaylistBtn').addEventListener('click', function() {
            const form = document.getElementById('newPlaylistForm');
            const createButton = document.getElementById('createPlaylistBtn');
            form.classList.remove('hidden');
            createButton.classList.add('hidden');
        });

        document.getElementById('cancelBtn').addEventListener('click', function() {
            const form = document.getElementById('newPlaylistForm');
            const createButton = document.getElementById('createPlaylistBtn');
            form.classList.add('hidden');
            createButton.classList.remove('hidden');
        });
    </script>
</x-layout>
