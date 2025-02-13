<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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

        User::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'username' => 'admin',
            'password' => 'admin',
            'role_id' => '00000000-0000-0000-0000-000000000001',
        ]);
    }
}
