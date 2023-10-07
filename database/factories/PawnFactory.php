<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pawn>
 */
class PawnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = User::where('role', 'customer')->get()->random()->national_id;
        $examination = Examination::all()->random()->id;

        return [
            'customer_id' => $customer,
            'examination_id' => $examination,
            'contract_date' => fake()->dateTime(),
            'expiry_date' => fake()->dateTime(),
            'interest_rate' => fake()->randomFloat(2, 0, 1),
            'loan_amount' => fake()->randomFloat(2, 0, 1000000),
            'total_term' => fake()->numberBetween(),
            'fine' => fake()->randomFloat(2, 0, 1000000),
            'shop_payout_status' => fake()->randomElement(['pending', 'paid']),
            'shop_payout_type' => fake()->randomElement(['cash', 'transaction']),
            'customer_account' => fake()->numerify('#############'),
            'paid_amount' => fake()->randomFloat(2, 0, 1000000),
            'paid_term' => fake()->numberBetween(),
            'next_payment' => fake()->dateTime(),
            'status' => fake()->randomElement(['finish', 'unfinish'])
        ];
    }
}
