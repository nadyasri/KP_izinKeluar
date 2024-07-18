<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class AccPegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
#        DB::table('master_atasan')->insert([
#            ["id_atasan" => 6, 'NIP' =>  196708211993032008, 'Nama Depan' => 'Yeyen', 'Nama Belakang' => 'Heryani', 'Jabatan' => 'Panitera Muda Gugatan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'yeyen', 'Password' => 'yeyen123'],
 #           ['id_atasan' => 8, 'NIP' =>  197207041999031005, 'Nama Depan' => 'Yusuf Budi', 'Nama Belakang' => 'Santoso', 'Jabatan' => 'Kepala Sub Bagian Perencanaan, Teknologi Informasi, dan Pelaporan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'yusuf', 'Password' => 'yusuf123'],
#        ]);
        
        DB::table('master_pegawai')->insert([
            ["id_atasan" => 6, 'NIP' =>  199402112022032011, 'Nama_Depan' => 'Maya Anggraeni Rahmah', 'Nama_Belakang' => 'Permana', 'Jabatan' => 'Klerek-Analis Perkara Peradilan', 'Pangkat' => 'Penata Muda', 'Username' => 'maya', 'Password' => bcrypt('maya123')],
            ['id_atasan' => 8, 'NIP' => 199310272020122009, 'Nama_Depan' => 'Faza', 'Nama_Belakang' => 'Faridah', 'Jabatan' => 'Pranata Komputer Ahli Pertama', 'Pangkat' => 'Penata Muda', 'Username' => 'faza', 'Password' => bcrypt('faza123')],
        ]);
    }

}
