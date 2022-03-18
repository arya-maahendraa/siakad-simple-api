<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        MataKuliah::truncate();
        MataKuliah::unguard();

        Jadwal::truncate();
        Jadwal::unguard();

        $this->call(FakultasSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(RoleSeeder::class);

        $matakuliah = MataKuliah::factory()->count(100)
            ->setProdi([1, 2, 3, 4, 5, 6, 7, 8, 9])->create();

        $listMatkul = $matakuliah->map(fn($item, $key) => $item->id)->toArray();
        Jadwal::factory(50)->matkul($listMatkul)->create();
        $this->call(UserSeeder::class);

        MataKuliah::reguard();
        Jadwal::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
