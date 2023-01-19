<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'nama' => 'Ryan',
            'age' => 19
        ]);

        Author::create([
            'nama' => 'Wili',
            'age' => 18
        ]);

        Author::create([
            'nama' => 'Alvin',
            'age' => 21
        ]);
    }
}
