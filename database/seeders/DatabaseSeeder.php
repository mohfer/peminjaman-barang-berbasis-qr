<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'nim' => 112233,
            'nama' => 'Mohamad Ferdiansyah',
            'jk' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'telp' => '080808080808',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('barangs')->insert([
            'kode' => 'INF001',
            'nama' => 'Infocus',
            'jenis' => 'Elektronik',
            'jumlah' => 20,
            'qr' => 'test',
        ]);

        DB::table('peminjamans')->insert([
            'id_barang' => 1,
            'id_user' => 1,
            'jumlah' => '5',
            'waktu' => '2024-08-27 22:35:34',
        ]);
    }
}
