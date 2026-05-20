<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => "user{$i}@example.com",
                'password' => 'password',
                'role' => fake()->randomElement(['admin', 'staff']),
            ]);
        }
    }
}
