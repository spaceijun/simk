<?php

namespace Database\Factories;

use App\Models\akun;
use App\Models\hutangpiutang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\hutangpiutang>
 */
class hutangpiutangFactory extends Factory
{
    protected $model = hutangpiutang::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'akun_id' => akun::inRandomOrder()->first()->id ?? 1, // Ambil akun secara acak
            'nama_pihak' => $this->faker->name(),
            'jenis' => $this->faker->randomElement(['HUTANG', 'PIUTANG']),
            'nominal' => $this->faker->randomFloat(2, 10000, 5000000),
            'jatuh_tempo' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            'status' => $this->faker->randomElement(['BELUM DIBAYAR', 'LUNAS']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
