<?php

namespace Database\Factories;

use App\Models\Groupe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'groupe_id'=>Groupe::all()->random()->id,
            'nom' =>fake()->name(),
            'prenom'=>fake()->firstName(),
            'email'=>fake()->safeEmail(),
            'adresse'=>fake()->text(40),
        ];
    }
}
