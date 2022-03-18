<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->bothify('?########'),
            'no_ijaza' => null,
            'sekolah_asal' => $this->faker->randomElement(['sma n 2 mars', 'sma 100 pluto']),
            'dosen_id' => 1,
            'prodi_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'nama_ayah' => $this->faker->firstNameMale(),
            'nama_ibu' => $this->faker->firstNameFemale(),
            'pekerjaan_ayah' => $this->faker->jobTitle(),
            'pekerjaan_ibu' => $this->faker->jobTitle(),
            'alamat_orangtua' => $this->faker->streetAddress(),
            'status_awal' => $this->faker->randomElement(['mahsiswa baru', 'pindahan']),
            'status' => $this->faker->randomElement(['lulus', 'belum lulus', 'drop out']),
        ];
    }
}
