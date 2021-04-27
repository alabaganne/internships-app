<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(5)->create()->each(function($company) {
            $company->user()->save(
                User::factory()->create()
            );
        });
    }
}
