<?php

namespace Database\Factories;

use App\Models\UniversitySupervisor;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversitySupervisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UniversitySupervisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'field_id' => rand(1, 8)
        ];
    }
}
