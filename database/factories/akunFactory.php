<?php

namespace Database\Factories;

use App\Models\akun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\akun>
 */
class akunFactory extends Factory
{
    protected $model = akun::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_akun' => $this->faker->company(),
            'no_rek' => $this->faker->numerify('########'),
            'tipe' => $this->faker->randomElement(['BANK', 'EMONEY']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
