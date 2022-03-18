<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    protected $data = [
        [1, 'S1 Teknik Sipil', 'S1', 1],
        [2, 'S1 Arsitektur', 'S1', 2],
        [3, 'S1 Penrencangan Wilayah & Kota', 'S1', 2],
        [4, 'S1 Mesin', 'S1', 3],
        [5, 'S1 Electro', 'S1', 4],
        [6, 'D3 Listrik', 'D3', 4],
        [7, 'S1 Informatika', 'S1', 5],
        [8, 'S1 Sistem Informasi', 'S1', 5],
        [9, 'S1 Akuntansi', 'S1', 8],
        [10, 'S1 Manajement', 'S1', 7],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::truncate();
        Prodi::unguard();

        $data = $this->data;
        for ($i = 0; $i < count($data); $i++) {
            Prodi::create([
                'id' => $data[$i][0],
                'name' => $data[$i][1],
                'jenjang' => $data[$i][2],
                'jurusan_id' => $data[$i][3],
            ]);
        }

        Prodi::reguard();
    }
}
