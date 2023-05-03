<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembeli;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Pembeli::create([
            'user_id' => 1,
            'pulsa_id' => 2,
            'nama' => 'Ahmad Rohim',
            'no_telepon' => '085870831024',
            'tanggal_beli' => '2023-05-02',
            'jumlah_beli' => 50000,
            'kode_pembeli' => 'abcdefghijklmnopqrstu'
        ]);

        Pembeli::create([
            'user_id' => 1,
            'pulsa_id' => 1,
            'nama' => 'Eko Hari Subagyo',
            'no_telepon' => '08753300450',
            'tanggal_beli' => '2023-05-01',
            'jumlah_beli' => 20000,
            'kode_pembeli' => 'abxdefyhijklmnjpqritu'
        ]);
    }
}
