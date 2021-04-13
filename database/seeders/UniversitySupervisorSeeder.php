<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UniversitySupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UniversitySupervisor::factory(16)->create()->map(function($university_supervisor) {
            $university_supervisor->user()->save(
                \App\Models\User::factory()->create()
            );
        });
    }
}
