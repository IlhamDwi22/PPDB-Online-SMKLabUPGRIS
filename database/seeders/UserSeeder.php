<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Administrator PPDB',
            'username' => 'admin_upgris',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'role_id' => 4,
            'name' => 'Calon Murid Siswa',
            'username' => '1234567890',
            'password' => Hash::make('2008-10-05'),
        ]);
    }
}
