<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\Pawn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gold>
 */
class GoldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $examination = Examination::all()->random()->contract_id;
        $pawn = Pawn::all()->random()->contract_id;

        return [
            'pawn_id' => $pawn,
            'examination_id' => $examination,
            'weight' => fake()->randomFloat(2, 0, 1000000),
            'purity' => fake()->randomFloat(2, 0, 1000000),
            'description' => fake()->sentence(),
            'image_path' => null,
            'status' => fake()->randomElement(['examining', 'pawned', 'redeemed', 'unredeemed'])
        ];
    }
}
