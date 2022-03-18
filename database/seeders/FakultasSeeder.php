<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    protected $list = [
        ['1', 'Program Pasca Sarjana', 'Program Pasca Sarjana'],
        ['2', 'Fakultas Keguruan dan Ilmu Pendidikan', 'FKIP'],
        ['3', 'Fakultas Hukum', 'FAKUM'],
        ['4', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'FISIP'],
        ['5', 'Fakultas Ekonomi', 'FEKON'],
        ['6', 'Fakultas Pertanian', 'FAPERTA'],
        ['7', 'Fakultas Teknik', 'FATEK'],
        ['8', 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'FMIPA'],
        ['9', 'Fakultas Kehutanan', 'FAHUT'],
        ['10', 'Fakultas Peternakan dan Perikanan', 'FAPETKAN'],
        ['11', 'Fakultas Kedokteran', 'FK'],
        ['12', 'Fakultas Kesehatan Masyarakat', 'FKM'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::truncate();
        Fakultas::unguard();
        for ($i = 0; $i < count($this->list); $i++) {
            Fakultas::create([
                'id' => $this->list[$i][0],
                'name' => $this->list[$i][1],
                'singkatan' => $this->list[$i][2],
            ]);
        }
        Fakultas::reguard();
    }
}
