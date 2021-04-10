<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Field;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory(10)->create()->map(function($student) {
            $student->user()->save(\App\Models\User::factory()->create());
        });
    }
}
