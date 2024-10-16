<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Song
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Explore the latest songs and their artists.
                </p>
            </div>

            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="{{ $song->created_at->format('Y-m-d') }}" class="text-gray-500">
                            {{ $song->created_at->format('M d, Y') }}
                        </time>
                        <a href="/artists/{{ $song->artist->username }}"
                            class="rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                            {{ $song->artist->name }}
                        </a>
                    </div>
                    <div class="group relative">
                        <a href="/genres/{{ $song->category->slug }}" class="hover:underline text-xs">Genre: {{ $song->category->name }}</a>
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 hover:underline">
                            <a href="/songs/{{ $song['slug'] }}">
                                {{ $song->title }}
                            </a>
                        </h3>
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-layout>
