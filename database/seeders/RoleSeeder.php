<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nama_role' => 'admin'],
            ['nama_role' => 'tata_usaha'],
            ['nama_role' => 'kepala_sekolah'],
            ['nama_role' => 'siswa'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
