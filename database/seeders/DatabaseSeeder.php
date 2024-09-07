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
            'nim' => 112233,
            'name' => 'Admin',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'phone' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'nim' => 223344,
            'name' => 'User',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'phone' => '0987654321',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'nim' => 334455,
            'name' => 'User 2',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Informatika',
            'phone' => '1029384756',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'nim' => 445566,
            'name' => 'User 3',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Ekonomi',
            'prodi' => 'Manajemen',
            'phone' => '5678901234',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'nim' => 556677,
            'name' => 'User 4',
            'gender' => 'Perempuan',
            'fakultas' => 'Fakultas Kedokteran',
            'prodi' => 'Kedokteran Umum',
            'phone' => '6789012345',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'nim' => 667788,
            'name' => 'User 5',
            'gender' => 'Laki-laki',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Sistem Informasi',
            'phone' => '7890123456',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('password'),
            'token' => strtolower(Str::random(10)),
            'role' => 'user',
        ]);

        DB::table('items')->insert([
            'code' => 'INF001',
            'name' => 'Infocus',
            'type' => 'Peralatan Presentasi',
            'qty' => 20,
            'token' => 'grj3h26qsz',
        ]);

        DB::table('items')->insert([
            'code' => 'MKT001',
            'name' => 'Mouse',
            'type' => 'Peralatan Kantor',
            'qty' => 20,
            'token' => 'poawnd8mda',
        ]);

        DB::table('items')->insert([
            'code' => 'INF002',
            'name' => 'Projector',
            'type' => 'Peralatan Presentasi',
            'qty' => 10,
            'token' => strtolower(Str::random(10)),
        ]);

        DB::table('items')->insert([
            'code' => 'MKT002',
            'name' => 'Keyboard',
            'type' => 'Peralatan Kantor',
            'qty' => 30,
            'token' => strtolower(Str::random(10)),
        ]);

        DB::table('items')->insert([
            'code' => 'LAB001',
            'name' => 'Bunsen Burner',
            'type' => 'Peralatan Laboratorium',
            'qty' => 15,
            'token' => strtolower(Str::random(10)),
        ]);

        DB::table('items')->insert([
            'code' => 'CMP001',
            'name' => 'Computer',
            'type' => 'Peralatan IT',
            'qty' => 50,
            'token' => strtolower(Str::random(10)),
        ]);
    }
}
