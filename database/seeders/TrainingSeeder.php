<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'nama' => 'Training Laravel',
            'nama_trainer' => 'Luthfi',
            'kapasitas' => 5,
            'tipe' => 'private',
            'deskripsi' => 'Training Laravel for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 60,
            'status' => 'on progress',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'nama' => 'Training React',
            'nama_trainer' => 'Haikal',
            'kapasitas' => 10,
            'tipe' => 'public',
            'deskripsi' => 'Training React for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 60,
            'status' => 'on progress',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'nama' => 'Training Vue',
            'nama_trainer' => 'Rizky',
            'kapasitas' => 10,
            'tipe' => 'private',
            'deskripsi' => 'Training Vue for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 60,
            'status' => 'done',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'nama' => 'Training Angular',
            'nama_trainer' => 'Rizal',
            'kapasitas' => 20,
            'tipe' => 'public',
            'deskripsi' => 'Training Angular for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 60,
            'status' => 'done',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000005',
            'nama' => 'Training NodeJS',
            'nama_trainer' => 'Luthfi',
            'kapasitas' => 16,
            'tipe' => 'private',
            'deskripsi' => 'Training NodeJS for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 30,
            'status' => 'on progress',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000006',
            'nama' => 'Training ExpressJS',
            'nama_trainer' => 'Haikal',
            'kapasitas' => 16,
            'tipe' => 'public',
            'deskripsi' => 'Training ExpressJS for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 30,
            'status' => 'on progress',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000007',
            'nama' => 'Training MongoDB',
            'nama_trainer' => 'Rizky',
            'kapasitas' => 16,
            'tipe' => 'private',
            'deskripsi' => 'Training MongoDB for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 30,
            'status' => 'done',
        ]);

        Training::create([
            'id' => '00000000-0000-0000-0000-000000000008',
            'nama' => 'Training MySQL',
            'nama_trainer' => 'Rizal',
            'kapasitas' => 16,
            'tipe' => 'public',
            'deskripsi' => 'Training MySQL for beginner',
            'tanggal' => '2021-01-01 08:00:00',
            'durasi' => 30,
            'status' => 'done',
        ]);

    }
}
