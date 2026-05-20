<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
use App\Models\VisitorSite;
use App\Models\VisitorVisit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteIds = VisitorSite::pluck('id')->toArray();
        $visitorIds = Visitor::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $statuses = ['checked_in', 'checked_out', 'cancelled'];

        for ($i = 0; $i < 15; $i++) {
            $status = fake()->randomElement($statuses);
            $checkIn = fake()->dateTimeBetween('-1 month', 'now');
            
            // Logic: Only have check_out_at if status is checked_out
            $checkOut = ($status === 'checked_out') 
                ? fake()->dateTimeBetween($checkIn, 'now') 
                : null;

            VisitorVisit::create([
                'visitor_site_id' => fake()->randomElement($siteIds),
                'visitor_id' => fake()->randomElement($visitorIds),
                'host_user_id' => fake()->randomElement($userIds),
                'checked_in_by' => fake()->randomElement($userIds),
                'checked_out_by' => ($status === 'checked_out') ? fake()->randomElement($userIds) : null,
                'purpose' => fake()->sentence(3),
                'vehicle_no' => fake()->bothify('??-####'),
                'status' => $status,
                'check_in_at' => $checkIn,
                'check_out_at' => $checkOut,
                'remarks' => fake()->realText(50),
            ]);
        }
    }
}
