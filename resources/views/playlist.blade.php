<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-5 sm:py-5">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $playlist->name }}
                </h2>
                <p id="display-description" class="mt-4 text-md text-gray-700">{{ $playlist->description }}</p>
                <button id="edit-description-btn" class="mt-2 px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-900">
                    Edit Description
                </button>
                <form id="edit-description-form" action="{{ route('playlists.update-description', $playlist) }}" method="POST" class="mt-4 hidden">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Edit Description:</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md bg-gray-100">{{ $playlist->description }}</textarea>
                    </div>
                    <button type="submit" class="mt-2 px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-900">
                        Update Description
                    </button>
                </form>
                <script>
                    document.getElementById('edit-description-btn').addEventListener('click', function() {
                        var form = document.getElementById('edit-description-form');
                        var displayDescription = document.getElementById('display-description');
                        var button = document.getElementById('edit-description-btn');
                        form.classList.toggle('hidden');
                        displayDescription.classList.toggle('hidden');
                        button.classList.toggle('hidden');
                    });
                </script>
            </div>
            <h3 class="text-xl font-semibold mt-6">Songs in this Playlist:</h3>
            <ul class="mt-4">
                @forelse ($playlist->songs as $song)
                    <li class="mb-3 group relative bg-gray-100 rounded-md px-1">
                        {{ $song->title }} by {{ $song->artist->name }}
                        <form action="{{ route('playlists.remove-song', [$playlist, $song]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="absolute top-0.5 right-2 hidden group-hover:block w-5 h-5 text-red-600 bg-white border border-red-600 rounded-full items-center justify-center text-xs">
                                -
                            </button>
                        </form>
                    </li>
                @empty
                    <li>No songs in this playlist yet.</li>
                @endforelse
            </ul>
            <div class="mt-6">
                <h3 class="text-xl font-semibold">Add a Song to Playlist</h3>

                <form action="{{ route('playlists.add-song', $playlist) }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="song_id" class="block text-sm font-medium text-gray-700">Select Song:</label>
                        <select name="song_id" id="song_id" class="mt-1 block w-full bg-gray-100 rounded-md">
                            @foreach ($playlist->songs as $song)
                                <option value="{{ $song->id }}">{{ $song->title }} by {{ $song->artist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="mt-4 px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-900">
                        Add Song
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
