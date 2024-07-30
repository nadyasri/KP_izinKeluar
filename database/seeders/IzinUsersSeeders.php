<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IzinUsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'namaDepan' => 'Admin',
                'namaBelakang' => 'Pertama',
                'username' => 'ad123',
                'password'=> bcrypt('admin1'),
                'role' => 'admin',
                'nip' => '0',
                'pangkat'=>'-',
                'jabatan' => '-',
            ],

            [
                'namaDepan' => 'pegawai',
                'namaBelakang' => '123',
                'username' => 'peg13',
                'password'=> bcrypt('pegawai1'),
                'role' => 'pegawai',
                'nip' => '02',
                'pangkat'=>'III/c',
                'jabatan' => 'Staff',
            ],

            [
                'namaDepan' => 'superadmin',
                'namaBelakang'=>'123',
                'username' => 'super123',
                'password'=> bcrypt('superadmin1'),
                'role' => 'superadmin',
                'nip' => '03',
                'pangkat'=>' IV/E',
                'jabatan' => 'Ketua',
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
