<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $min = rand(22222, 99999);

        //            Get the first role but in a random order
        $role = Role::query()->inRandomOrder()->pluck('id')[0];

        return [
            'role_id'   => $role,
            'country'   => fake()->country,
            'state'     => fake()->city,
            'address'   => fake()->streetAddress,
            'min_salary'    => $min,
            'max_salary'    => $min + 15000
        ];
    }
}
