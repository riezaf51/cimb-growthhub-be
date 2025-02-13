<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

    }
}
