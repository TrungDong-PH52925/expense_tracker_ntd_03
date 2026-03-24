<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        Category::insert([
        ['name' => 'Food', 'user_id' => $user->id],
        ['name' => 'Transport', 'user_id' => $user->id],
        ['name' => 'Study', 'user_id' => $user->id],
        ['name' => 'Entertainment', 'user_id' => $user->id],
        ]);
    }
}
