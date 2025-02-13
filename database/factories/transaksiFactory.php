<?php

namespace Database\Factories;

use App\Models\akun;
use App\Models\kategori;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transaksi>
 */
class transaksiFactory extends Factory
{
    protected $model = transaksi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'akun_id' => akun::inRandomOrder()->first()->id ?? akun::factory(),
            'kategori_id' => kategori::inRandomOrder()->first()->id ?? kategori::factory(),
            'tanggal' => $this->faker->date(),
            'jumlah' => $this->faker->randomFloat(2, 10000, 5000000),
            'jenis' => $this->faker->randomElement(['PEMASUKAN', 'PENGELUARAN']),
            'keterangan' => $this->faker->sentence(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
