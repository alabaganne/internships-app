<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do {
            $from = rand(1, 32);
            $to = rand(1, 32);
        } while ($from === $to);

        return [
            'from_id' => $from,
            'to_id' => $to,
            'text' => $this->faker->sentence(),
            'read_at' => now()
        ];
    }
}
