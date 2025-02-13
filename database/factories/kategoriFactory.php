<?php

namespace Database\Factories;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kategori>
 */
class kategoriFactory extends Factory
{
    protected $model = kategori::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori' => $this->faker->name(),
            'sub_kategori' => $this->faker->name(),
            'tipe' => $this->faker->randomElement(['PEMASUKAN', 'PENGELUARAN']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
