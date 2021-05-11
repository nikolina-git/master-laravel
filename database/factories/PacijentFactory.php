<?php

namespace Database\Factories;

use App\Models\Pacijent;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacijentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pacijent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_and_surname' => $this->faker->name,
            'description' => $this->faker->sentence($nbWords=6,$variableWords=true),
            'user_id' => 2,
        ];
    }
}
