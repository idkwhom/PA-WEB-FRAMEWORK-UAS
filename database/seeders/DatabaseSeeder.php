<?php

namespace Database\Seeders;

use App\Models\Ukm;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Ukm::create([
            'nama_ukm' => 'Fotografi',
            'tujuan_ukm' => 'Menciptakan foto bagus',
            'kegiatan_ukm' => 'berfoto',
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]); 
        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]); 

        $admin = User::create([
            'nama' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make(12345678),
            'prodi' => '-',
            'fakultas' => '-',
            'no_hp' => '-',
            'nim' => '-'
        ]);
        $admin->assignRole('admin');
    }
}
