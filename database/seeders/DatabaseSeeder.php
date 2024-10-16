<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Playlist;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([CategorySeeder::class, ArtistSeeder::class]);
        Song::factory(100)->recycle([
            Category::all(),
            Artist::all()
        ])->create();

        Playlist::factory(5)->create();
    }
}
