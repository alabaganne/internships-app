<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Field::factory(10)->create();
        \App\Models\City::factory(10)->create();

        $students = \App\Models\Student::factory(5)->create();
        foreach($students as $student) {
            $student->user()->save(User::factory()->create());
        }

        $companies = \App\Models\Company::factory(5)->create();
        foreach($companies as $company) {
            $company->user()->save(User::factory()->create());
        }

        $company_supervisors = \App\Models\CompanySupervisor::factory(5)->create();
        foreach($company_supervisors as $supervisor) {
            $supervisor->user()->save(User::factory()->create());
        }

        \App\Models\Internship::factory(10)->create();

        User::firstOrCreate([
            'username' => 'johndoe',
        ], [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('123456'),
            'is_admin' => true
        ]);
    }
}
