<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-5 sm:py-5">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Dashboard
                </h1>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    This is your music and playlist
                </p>
            </div>
            <div
                class="mx-auto mt-2 pt-4 max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 sm:mt-2 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div class="mt-6 flex justify-between space-x-4">
                    <div class="flex-1 bg-gray-100 rounded-lg p-6 text-center shadow-md">
                        <a href="{{ route('songs.index') }}"
                            class="text-xl font-semibold text-gray-700 hover:underline transition">
                            Total Music
                        </a>
                        <p class="text-3xl font-bold text-gray-900">
                            {{ $totalSongs }}
                        </p>
                    </div>
                    <div class="flex-1 bg-gray-100 rounded-lg p-6 text-center shadow-md">
                        <a href="{{ route('playlists.index') }}"
                            class="text-xl font-semibold text-gray-700 hover:underline transition">
                            Total Playlists
                        </a>
                        <p class="text-3xl font-bold text-gray-900">
                            {{ $totalPlaylists }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
