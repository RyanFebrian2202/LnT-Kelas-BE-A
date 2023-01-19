<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'judul' => 'test',
            'penerbit' => 'halo',
            'sinopsis' => 'salam haya',
            'tahun_terbit' => 2020,
            'category_id' => 3
        ]);

        Book::create([
            'judul' => 'test2',
            'penerbit' => 'halo',
            'sinopsis' => 'salam haya',
            'tahun_terbit' => 2020,
            'category_id' => 2
        ]);

        Book::create([
            'judul' => 'test3',
            'penerbit' => 'halo',
            'sinopsis' => 'salam haya',
            'tahun_terbit' => 2020,
            'category_id' => 2
        ]);

        Book::create([
            'judul' => 'test4',
            'penerbit' => 'halo',
            'sinopsis' => 'salam haya',
            'tahun_terbit' => 2020,
            'category_id' => 1
        ]);
    }
}
