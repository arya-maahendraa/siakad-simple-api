<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    protected $model = MataKuliah::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'kode' => $this->faker->unique()->bothify('???-###'),
            'sks' => $this->faker->randomElement([2, 3, 4]),
            'prodi_id' => 1
        ];
    }

    public function setProdi(array $prodi)
    {
        return $this->state(function (array $attributes) use ($prodi) {
            return [
                'prodi_id' => $this->faker->randomElement($prodi)
            ];
        });
    }
}
