<?php

namespace Database\Factories;

use App\Models\CompanySupervisor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanySupervisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanySupervisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 10 Companies must be seeder before running this factory
        return [
            'company_id' => rand(1, 8)
        ];
    }
}
