<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            ['name' => 'Tester 01', 'email' => 'tester01@gmail.com',
            'password' => Hash::make('12345')]
        );
    }
}
