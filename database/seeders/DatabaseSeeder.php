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
        $this->call([
            FieldSeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            CompanySupervisorSeeder::class,
            StudentSeeder::class,
            InternshipSeeder::class,
            UniversitySupervisorSeeder::class,
        ]);

        $password = bcrypt('password');
        \App\Models\Student::factory()->create()
            ->user()->save(User::create([
                'name' => 'John Doe',
                // 'username' => 'johndoe',
                'email' => 'student@example.com',
                'password' => $password,
                'phone_number' => '+216 50 101 959'
            ]));
        
        $company = \App\Models\Company::factory()->create();
        $company->user()->save(User::create([
            'name' => 'Realinflo',
            // 'username' => 'realinflo',
            'email' => 'company@example.com',
            'password' => $password,
            'phone_number' => '+216 50 101 959'
        ]));
        $company->supervisors()->saveMany(
            \App\Models\CompanySupervisor::factory(5)->create()->map(function($supervisor) {
                $supervisor->user()->save(User::factory()->create());

                return $supervisor;
            })
        );
    }
}
