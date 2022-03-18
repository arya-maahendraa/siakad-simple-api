<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tahun_ajaran_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'hari' => $this->faker->dayOfWeek(),
            'jam' => $this->faker->time('H:i'),
            'kelas' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'matkul_id' => 1
        ];
    }

    public function matkul(array $listMatkul)
    {
        return $this->state(function (array $attributes) use ($listMatkul) {
            return [
                'matkul_id' => $this->faker->randomElement($listMatkul)
            ];
        });
    }
}
