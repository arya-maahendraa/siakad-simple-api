<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::unguard();

        Role::create([
            "id" => 1, "name" => "admin",
        ]);
        Role::create([
            "id" => 2, "name" => "Dosen"
        ]);
        Role::create([
            "id" => 3, "name" => "Mahasiswa"
        ]);

        Role::reguard();
    }
}
