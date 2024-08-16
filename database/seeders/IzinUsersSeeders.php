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
                'nama' => 'Admin1',
                'username' => 'ad123',
                'password'=> bcrypt('admin1'),
                'role' => 'admin',
                'nip' => '0',
                'pangkat'=>'-',
                'Users_groupId' => 0
            ],

            [
                'nama' => 'pegawai1',
                'username' => 'peg13',
                'password'=> bcrypt('pegawai1'),
                'role' => 'pegawai',
                'nip' => '02',
                'pangkat'=>'III/c',
                'Users_groupId' => 1,
            ],

            [
                'nama' => 'superadmin1',
                'username' => 'super123',
                'password'=> bcrypt('superadmin1'),
                'role' => 'superadmin',
                'nip' => '03',
                'pangkat'=>' IV/E',
                'Users_groupId' => 2,
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
