<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicule>
 */
class VehiculeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marque' => $this->faker->word,
            'model' => $this->faker->word,
            'typeCarburant' => $this->faker->randomElement(['Essence', 'Diesel', 'Hybride']),
            'immatriculation' => $this->faker->unique()->regexify('[A-Z]{2}-[0-9]{3}-[A-Z]{2}'),
            'photos' => $this->faker->imageUrl(),
            'client_id' => Client::all()->random()->id,
        ];
    }
}
