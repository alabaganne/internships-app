<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'internship_id' => rand(1, 42),
            'student_id' => rand(1, 8),
            'company_id' => rand(1, 8),
            'cover_letter' => $this->faker->paragraph(),
            'message' => $this->faker->paragraph(),
        ];
    }
}
