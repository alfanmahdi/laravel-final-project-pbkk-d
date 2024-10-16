<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Rock',
            'slug' => 'rock'
        ]);

        Category::create([
            'name' => 'Jazz',
            'slug' => 'jazz'
        ]);

        Category::create([
            'name' => 'Hip Hop',
            'slug' => 'hip-hop'
        ]);

        Category::create([
            'name' => 'Pop',
            'slug' => 'pop'
        ]);

        Category::create([
            'name' => 'Classical',
            'slug' => 'classical'
        ]);

        Category::create([
            'name' => 'EDM',
            'slug' => 'edm'
        ]);
    }
}
