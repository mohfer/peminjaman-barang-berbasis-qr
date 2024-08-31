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
            'name' => 'Mohamad Ferdiansyah',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'phone' => '080808080808',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('items')->insert([
            'code' => 'INF001',
            'name' => 'Infocus',
            'type' => 'Elektronik',
            'qty' => 20,
            'qr' => 'test',
        ]);

        DB::table('borrowings')->insert([
            'item_id' => 1,
            'user_id' => 1,
            'qty' => '5',
            'time' => '2024-08-27 22:35:34',
        ]);
    }
}
