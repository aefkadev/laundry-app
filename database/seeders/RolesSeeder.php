<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 99,
                'nama_roles' => 'Guest'
            ],
            [
                'id' => 1,
                'nama_roles' => 'SuperAdmin'
            ],
            [
                'id' => 2,
                'nama_roles' => 'Admin'
            ],
            [
                'id' => 3,
                'nama_roles' => 'Member'
            ],
        ];
        Role::query()->insert($roles);
    }
}
