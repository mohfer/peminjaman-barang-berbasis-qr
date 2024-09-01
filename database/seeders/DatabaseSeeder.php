<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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
            'nim' => 3337240025,
            'name' => 'Mohamad Ferdiansyah',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'phone' => '083851522259',
            'email' => 'verdian352@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('items')->insert([
            'code' => 'INF001',
            'name' => 'Infocus',
            'type' => 'Peralatan Presentasi',
            'qty' => 20,
            'token' => strtolower(Str::random(10)),
        ]);

        DB::table('borrows')->insert([
            'item_id' => 1,
            'user_id' => 1,
            'qty' => '5',
            'time' => '2024-08-27 22:35:34',
        ]);
    }
}
