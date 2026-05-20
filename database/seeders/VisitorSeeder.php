<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            Visitor::create([
                'name' => fake()->name(),
                'mobile' => fake()->phoneNumber(),
                'nid_number' => fake()->numerify('###########'),
                'photo' => 'https://i.pravatar.cc/150?u=' . fake()->unique()->safeEmail(),
                'address' => fake()->address(),
            ]);
        }
    }
}
