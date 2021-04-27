<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->words(5, true)),
            'description' => $this->faker->text(2400),
            'company_id' => rand(1, 5),
            'company_supervisor_id' => rand(1, 10),
            'field_id' => rand(1, 10),
            'remote' => rand(0, 1),
            'closing_at' => $this->faker->dateTimeBetween('now', '+4 months')
        ];
    }
}
