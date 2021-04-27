<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding 10 company supervisors
        \App\Models\CompanySupervisor::factory(10)->create()->each(function($supervisor) {
            $supervisor->user()->save(
                \App\Models\User::factory()->create()
            );
        });
    }
}
