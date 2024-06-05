<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reparation>
 */
class ReparationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'statut' => $this->faker->randomElement(['en attente', 'en cours', 'terminée']),
            'date_debut' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'date_fin' => $this->faker->dateTimeBetween('now', '+1 month'),
            'notes_mecanicien' => $this->faker->paragraph,
            'notes_client' => $this->faker->paragraph,
            'id_mecanicien' => User::where("role","Michanic")->inRandomOrder()->first()->id,  // Fetch a random mechanic ID
            'id_vehicule' => Vehicule::inRandomOrder()->first()->id, // Fetch a random vehicle ID
        ];
    }
}
