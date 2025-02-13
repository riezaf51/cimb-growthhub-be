<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Role::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'name' => 'admin',
        ]);

        Role::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'name' => 'employee',
        ]);

        Role::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'name' => 'hr',
        ]);

        Role::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'name' => 'trainee',
        ]);
    }
}
