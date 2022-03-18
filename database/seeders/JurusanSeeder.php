<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    protected $data = [
        [1, 'Teknik Sipil (B)', '7'],
        [2, 'Teknik Arsitektur (B)', '7'],
        [3, 'Teknik Mesin (B)', '7'],
        [4, 'Teknik Elektro (B)', '7'],
        [5, 'Teknologi Informasi', '7'],
        [6, 'IESP', '5'],
        [7, 'Ekonomi Manajemen', '5'],
        [8, 'Ekonomi Akuntansi', '5'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::truncate();
        Jurusan::unguard();
        $data = $this->data;
        for ($i = 0; $i < count($data); $i++) {
            Jurusan::create([
                'id' => $data[$i][0],
                'name' => $data[$i][1],
                'fakultas_id' => $data[$i][2],
            ]);
        }
        Jurusan::reguard();
    }
}
