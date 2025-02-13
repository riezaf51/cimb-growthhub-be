<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'username' => 'admin',
            'password' => 'admin',
            'role_id' => '00000000-0000-0000-0000-000000000001',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'username' => 'employee',
            'password' => 'employee',
            'role_id' => '00000000-0000-0000-0000-000000000002',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'username' => 'hr',
            'password' => 'hr',
            'role_id' => '00000000-0000-0000-0000-000000000003',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'username' => 'trainee',
            'password' => 'trainee',
            'role_id' => '00000000-0000-0000-0000-000000000004',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000005',
            'username' => 'user1',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000001',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000006',
            'username' => 'user2',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000002',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000007',
            'username' => 'user3',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000003',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000008',
            'username' => 'user4',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000004',
        ]);
    }
}
