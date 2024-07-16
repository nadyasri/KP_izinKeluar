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
                'name' => 'Admin 123',
                'username' => 'ad123',
                'role' => 'admin',
                'password'=> bcrypt('admin1'),
            ],

            [
                'name' => 'pegawai 123',
                'username' => 'peg13',
                'role' => 'pegawai',
                'password'=> bcrypt('pegawai1'),
            ],

            [
                'name' => 'superadmin123',
                'username' => 'super123',
                'role' => 'superadmin',
                'password'=> bcrypt('superadmin1'),
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
