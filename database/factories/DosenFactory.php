<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jurusan_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'nip' => $this->faker->unique()->numerify('#################'),
            'nidn' => $this->faker->unique()->numerify('########'),
            'nidk' => null,
            'nup' => $this->faker->unique()->numerify('########'),
            'pns' => $this->faker->boolean(),
            'golongan' => $this->faker->randomElement(['III/a', 'III/b', 'VI/a', 'VI/b']),
            'fungsional' => $this->faker->randomElement(['dosen tetap', 'dosen penggganti', 'staff'])
        ];
    }
}
