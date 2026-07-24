<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Rekayasa Perangkat Lunak Modern',
            'author' => 'R. Pressman',
            'category' => 'Teknologi',
            'publication_year' => 2020,
            'stock' => 5,
            'cover' => null,
        ]);

        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Andi Pratama',
            'category' => 'Pemrograman',
            'publication_year' => 2024,
            'stock' => 3,
            'cover' => null,
        ]);

        Book::create([
            'title' => 'Dasar Basis Data',
            'author' => 'Siti Rahma',
            'category' => 'Basis Data',
            'publication_year' => 2022,
            'stock' => 0,
            'cover' => null,
        ]);
    }
}
