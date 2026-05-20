<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VisitorSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $types = ['building', 'construction_site', 'event', 'office'];

        for ($i = 0; $i < 15; $i++) {
            VisitorSite::create([
                'name' => fake()->company() . ' ' . fake()->randomElement(['HQ', 'Branch', 'Site']),
                'site_type' => fake()->randomElement($types),
                'location' => fake()->address(),
                'is_active' => true,
                'created_by' => fake()->randomElement($userIds),
            ]);
        }
    }
}
