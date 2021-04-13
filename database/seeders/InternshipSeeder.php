<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Internship::factory(46)->create();
    }
}
