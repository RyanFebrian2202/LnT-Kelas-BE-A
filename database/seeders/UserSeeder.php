<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ryan Febrian',
            'dob' => '2000-01-01',
            'birthPlace' => 'Jakarta',
            'gender' => 'Male',
            'email' => 'ryan22febrian@gmail.com',
            'password' => Hash::make('RyanTest#123'),
            'role' => 'Admin'
        ]);

        User::create([
            'name' => 'Bryan',
            'dob' => '2000-01-01',
            'birthPlace' => 'Jakarta',
            'gender' => 'Male',
            'email' => 'bryan@gmail.com',
            'password' => Hash::make('BryanTest#123'),
            'role' => 'User'
        ]);

        User::create([
            'name' => 'Fatih',
            'dob' => '2000-01-01',
            'birthPlace' => 'Jakarta',
            'gender' => 'Male',
            'email' => 'fatih@gmail.com',
            'password' => Hash::make('FatihTest#123'),
            'role' => 'User'
        ]);
    }
}
