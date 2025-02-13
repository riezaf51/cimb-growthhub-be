<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Pendaftaran;
use App\Models\Training;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        User::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'username' => 'admin',
            'password' => 'admin',
            'role_id' => '00000000-0000-0000-0000-000000000001',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'user_id' => '00000000-0000-0000-0000-000000000001',
            'nama' => 'Luthfi',
            'tgl_lahir' => '1999-01-01',
            'pekerjaan' => 'Software Engineer',
            'perusahaan' => 'PT. Luthfi',
            'no_telepon' => '081234567890',
            'email' => 'luthfi@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'username' => 'employee',
            'password' => 'employee',
            'role_id' => '00000000-0000-0000-0000-000000000002',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'user_id' => '00000000-0000-0000-0000-000000000002',
            'nama' => 'Haikal',
            'tgl_lahir' => '1999-01-01',
            'pekerjaan' => 'Software Engineer',
            'perusahaan' => 'PT. Haikal',
            'no_telepon' => '081234567890',
            'email' => 'haikal@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'username' => 'hr',
            'password' => 'hr',
            'role_id' => '00000000-0000-0000-0000-000000000003',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'user_id' => '00000000-0000-0000-0000-000000000003',
            'nama' => 'Rizky',
            'tgl_lahir' => '1999-01-01',
            'pekerjaan' => 'Software Engineer',
            'perusahaan' => 'PT. Rizky',
            'no_telepon' => '081234567890',
            'email' => 'rizky@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'username' => 'trainee',
            'password' => 'trainee',
            'role_id' => '00000000-0000-0000-0000-000000000004',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'user_id' => '00000000-0000-0000-0000-000000000004',
            'nama' => 'Rizal',
            'tgl_lahir' => '1999-01-01',
            'pekerjaan' => 'Software Engineer',
            'perusahaan' => 'PT. Rizal',
            'no_telepon' => '081234567890',
            'email' => 'rizal@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000005',
            'username' => 'user1',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000001',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000005',
            'user_id' => '00000000-0000-0000-0000-000000000005',
            'nama' => 'Ahmad',
            'tgl_lahir' => '1995-05-05',
            'pekerjaan' => 'Marketing Specialist',
            'perusahaan' => 'PT. Ahmad',
            'no_telepon' => '081234567891',
            'email' => 'ahmad@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000006',
            'username' => 'user2',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000002',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000006',
            'user_id' => '00000000-0000-0000-0000-000000000006',
            'nama' => 'Budi',
            'tgl_lahir' => '1993-03-03',
            'pekerjaan' => 'Product Manager',
            'perusahaan' => 'PT. Budi',
            'no_telepon' => '081234567892',
            'email' => 'budi@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000007',
            'username' => 'user3',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000003',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000007',
            'user_id' => '00000000-0000-0000-0000-000000000007',
            'nama' => 'Citra',
            'tgl_lahir' => '1997-07-07',
            'pekerjaan' => 'UI/UX Designer',
            'perusahaan' => 'PT. Citra',
            'no_telepon' => '081234567893',
            'email' => 'citra@email.com',
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000008',
            'username' => 'user4',
            'password' => '12345678',
            'role_id' => '00000000-0000-0000-0000-000000000004',
        ]);

        Profile::create([
            'id' => '00000000-0000-0000-0000-000000000008',
            'user_id' => '00000000-0000-0000-0000-000000000008',
            'nama' => 'Dewi',
            'tgl_lahir' => '1992-02-02',
            'pekerjaan' => 'Data Analyst',
            'perusahaan' => 'PT. Dewi',
            'no_telepon' => '081234567894',
            'email' => 'dewi@email.com',
        ]);

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

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'training_id' => '00000000-0000-0000-0000-000000000001',
            'user_id' => '00000000-0000-0000-0000-000000000002',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'training_id' => '00000000-0000-0000-0000-000000000002',
            'user_id' => '00000000-0000-0000-0000-000000000006',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000003',
            'training_id' => '00000000-0000-0000-0000-000000000003',
            'user_id' => '00000000-0000-0000-0000-000000000007',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000004',
            'training_id' => '00000000-0000-0000-0000-000000000004',
            'user_id' => '00000000-0000-0000-0000-000000000008',
            'status' => 'rejected',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000005',
            'training_id' => '00000000-0000-0000-0000-000000000005',
            'user_id' => '00000000-0000-0000-0000-000000000001',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000006',
            'training_id' => '00000000-0000-0000-0000-000000000006',
            'user_id' => '00000000-0000-0000-0000-000000000002',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000007',
            'training_id' => '00000000-0000-0000-0000-000000000007',
            'user_id' => '00000000-0000-0000-0000-000000000003',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000008',
            'training_id' => '00000000-0000-0000-0000-000000000008',
            'user_id' => '00000000-0000-0000-0000-000000000004',
            'status' => 'rejected',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000009',
            'training_id' => '00000000-0000-0000-0000-000000000001',
            'user_id' => '00000000-0000-0000-0000-000000000004',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000010',
            'training_id' => '00000000-0000-0000-0000-000000000002',
            'user_id' => '00000000-0000-0000-0000-000000000007',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000011',
            'training_id' => '00000000-0000-0000-0000-000000000003',
            'user_id' => '00000000-0000-0000-0000-000000000008',
            'status' => 'rejected',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000012',
            'training_id' => '00000000-0000-0000-0000-000000000004',
            'user_id' => '00000000-0000-0000-0000-000000000005',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000013',
            'training_id' => '00000000-0000-0000-0000-000000000005',
            'user_id' => '00000000-0000-0000-0000-000000000002',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000014',
            'training_id' => '00000000-0000-0000-0000-000000000006',
            'user_id' => '00000000-0000-0000-0000-000000000003',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000015',
            'training_id' => '00000000-0000-0000-0000-000000000007',
            'user_id' => '00000000-0000-0000-0000-000000000004',
            'status' => 'rejected',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000016',
            'training_id' => '00000000-0000-0000-0000-000000000008',
            'user_id' => '00000000-0000-0000-0000-000000000001',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000017',
            'training_id' => '00000000-0000-0000-0000-000000000001',
            'user_id' => '00000000-0000-0000-0000-000000000006',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000018',
            'training_id' => '00000000-0000-0000-0000-000000000001',
            'user_id' => '00000000-0000-0000-0000-000000000008',
            'status' => 'approved',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);

        Pendaftaran::create([
            'id' => '00000000-0000-0000-0000-000000000019',
            'training_id' => '00000000-0000-0000-0000-000000000002',
            'user_id' => '00000000-0000-0000-0000-000000000007',
            'status' => 'pending',
            'tgl_daftar' => '2021-01-01 08:00:00',
        ]);
    }
}
