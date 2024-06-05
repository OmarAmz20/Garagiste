<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SparePart>
 */
class SparePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_piece' => $this->faker->word,
            'reference_piece' => $this->faker->unique()->numerify('###-####'),
            'fournisseur' => $this->faker->company,
            'prix' => $this->faker->randomFloat(2, 100, 1000), // Price between 100 and 1000 with 2 decimals
        ];
    }
}
