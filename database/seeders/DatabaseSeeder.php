<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'fullname' => 'IT Support',
            'email' => 'itsupport@perdana.my',
            'role' => 'Super Admin',
        ]);

        $Rank =
        Rank::firstOrCreate([
            'rank_name' => 'Captain',
            'rank_description' => 'The highest-ranking officer on the ship, responsible for overall command and decision-making.',
            'category' => 'Command Crew',
            'is_active' => 1,
        ]);
        Rank::firstOrCreate([
            'rank_name' => 'Chief Officer',
            'rank_description' => 'Second-in-command, assisting the captain in managing the ship and its crew.',
            'category' => 'Command Crew',
            'is_active' => 1,
        ]);

    }
}
