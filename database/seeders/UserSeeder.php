<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Dosen::truncate();
        Mahasiswa::truncate();

        Dosen::unguard();
        Mahasiswa::unguard();
        User::unguard();

        User::factory()->admin()->state([
            'email' => 'admin@test.com'
        ])->create();


        $user_dosen = User::factory()->dosen()->state([
            'email' => 'dosen@test.com'
        ])->create();
        $dosen = Dosen::factory()->state([
            'user_id' => $user_dosen->id,
        ])->create();

        $user_mahasiswa = User::factory()->mahasiswa()->state([
            'email' => 'mahasiswa@test.com'
        ])->create();
        Mahasiswa::factory()->state([
            'user_id' => $user_mahasiswa->id,
            'dosen_id' => $dosen->id
        ])->create();

        User::reguard();
        Dosen::reguard();
        Mahasiswa::reguard();
    }
}
