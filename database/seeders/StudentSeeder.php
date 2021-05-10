<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory(15)->create()->each(function($student) {
            $student->user()->save(\App\Models\User::factory()->create());
        });
    }
}
