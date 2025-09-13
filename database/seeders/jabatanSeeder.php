<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class jabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            [
                'groupId' => '0',
                'parentId' => '0',
                'jabatan' => 'Admin',                
            ],
            [
                'groupId' => '1',
                'parentId' => '1',
                'jabatan' => 'Ketua Pengadilan Agama',                
            ],
            [
                'groupId' => '2',
                'parentId' => '1',
                'jabatan' => 'Wakil Ketua Pengadilan Agama',                
            ],
            [
                'groupId' => '3',
                'parentId' => '1',
                'jabatan' => 'Panitera',                
            ],
            [
                'groupId' => '4',
                'parentId' => '1',
                'jabatan' => 'Sekretaris',                
            ],
            [
                'groupId' => '5',
                'parentId' => '1',
                'jabatan' => 'Hakim',                
            ],
            [
                'groupId' => '6',
                'parentId' => '3',
                'jabatan' => 'Panitera Muda Permohonan',                
            ],
            [
                'groupId' => '7',
                'parentId' => '3',
                'jabatan' => 'Panitera Muda Gugatan',                
            ],
            [
                'groupId' => '8',
                'parentId' => '3',
                'jabatan' => 'Panitera Muda Hukum',                
            ],
            [
                'groupId' => '9',
                'parentId' => '4',
                'jabatan' => 'Kasubag PTIP',                
            ],
            [
                'groupId' => '10',
                'parentId' => '4',
                'jabatan' => 'Kasubag Kepegawaian dan Ortala',                
            ],
            [
                'groupId' => '11',
                'parentId' => '4',
                'jabatan' => 'Kasubag Umum dan Keuangan',                
            ],
            [
                'groupId' => '12',
                'parentId' => '3',
                'jabatan' => 'Panitera Pengganti',                
            ],
            [
                'groupId' => '13',
                'parentId' => '3',
                'jabatan' => 'Jurusita/Jurusita Pengganti',                
            ],
            [
                'groupId' => '14',
                'parentId' => '4',
                'jabatan' => 'Fungsional Arsiparis',                
            ],
            [
                'groupId' => '15',
                'parentId' => '4',
                'jabatan' => 'Fungsional Pustakawan',                
            ],
            [
                'groupId' => '16',
                'parentId' => '4',
                'jabatan' => 'Fungsional Bendahara',                
            ],
            [
                'groupId' => '17',
                'parentId' => '6',
                'jabatan' => 'Staf Panitera Muda Permohonan',                
            ],
            [
                'groupId' => '18',
                'parentId' => '7',
                'jabatan' => 'Staf Panitera Muda Gugatan',                
            ],
            [
                'groupId' => '19',
                'parentId' => '8',
                'jabatan' => 'Staf Panitera Muda Hukum ',                
            ],
            [
                'groupId' => '20',
                'parentId' => '9',
                'jabatan' => 'Staf PTIP',                
            ],
            [
                'groupId' => '21',
                'parentId' => '10',
                'jabatan' => 'Staf Kepegawaian dan Ortala',                
            ],
            [
                'groupId' => '22',
                'parentId' => '11',
                'jabatan' => 'Staf Umum dan Keuangan',                
            ],
        ]);
    }
}
