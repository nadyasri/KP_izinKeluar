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
        DB::table('master_atasan')->insert([
#            ["id_atasan" => 1, 'nip' =>  196606061992031008, 'namaDepan' => 'Arif', 'namaBelakang' => 'Mukhsinin', 'jabatan' => 'Ketua', 'pangkat' => 'IV/d', 'username' => 'arif', 'password' => 'arif123'],
#            ["id_atasan" => 2, 'NIP' =>  197406232000031001, 'Nama Depan' => 'Hamzah', 'Nama Belakang' => '', 'Jabatan' => 'Wakil Ketua', 'Pangkat' => 'Pembina Utama Muda', 'Username' => 'hamzah', 'Password' => bcrypt('hamzah123')],
#            ["id_atasan" => 3, 'NIP' =>  196710051993031008, 'Nama Depan' => 'Asop', 'Nama Belakang' => 'Ridwan', 'Jabatan' => 'Panitera', 'Pangkat' => 'Pembina Tingkat I', 'Username' => 'asop', 'Password' => bcrypt('asop123')],
#            ["id_atasan" => 4, 'NIP' =>  197508072002121003, 'Nama Depan' => 'Agus', 'Nama Belakang' => 'Salim', 'Jabatan' => 'Sekretaris', 'Pangkat' => 'Pembina Tingkat I', 'Username' => 'agus', 'Password' => bcrypt('agus123')],
#            ["id_atasan" => 5, 'NIP' =>  197005061998032002, 'Nama Depan' => 'Yayah', 'Nama Belakang' => 'Nuriyah', 'Jabatan' => 'Panitera Muda Hukum', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'yayah', 'Password' => bcrypt('yayah123')],
#            ["id_atasan" => 6, 'NIP' =>  196708211993032008, 'Nama Depan' => 'Yeyen', 'Nama Belakang' => 'Heryani', 'Jabatan' => 'Panitera Muda Gugatan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'yeyen', 'Password' => bcrypt('yeyen123')],
#             ["id_atasan" => 7, 'NIP' =>  197110241998032002, 'Nama Depan' => 'Dewi Nurul', 'Nama Belakang' => 'Mustaqimah', 'Jabatan' => 'Panitera Muda Permohonan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'dewi', 'Password' => bcrypt('dewi123')],
#            ['id_atasan' => 8, 'NIP' =>  197207041999031005, 'Nama Depan' => 'Yusuf Budi', 'Nama Belakang' => 'Santoso', 'Jabatan' => 'Kepala Sub Bagian Perencanaan, Teknologi Informasi, dan Pelaporan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'yusuf', 'Password' => bcrypt('yusuf123')],
#             ["id_atasan" => 9, 'NIP' =>  196704021987031003, 'Nama Depan' => 'Muhammad', 'Nama Belakang' => 'Soleh', 'Jabatan' => 'Kepala Sub Bagian Kepegawaian, Organisasi, dan Tata Laksana', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'soleh', 'Password' => bcrypt('soleh123')],
#             ["id_atasan" => 10, 'NIP' =>  198410262009042006, 'Nama Depan' => 'Dewi Hiasri', 'Nama Belakang' => 'Oktaviani', 'Jabatan' => 'Kepala Sub Bagian Umum dan Keuangan', 'Pangkat' => 'Penata Tingkat I', 'Username' => 'hiasri', 'Password' => bcrypt('hiasri123')],
        ]);
        
        DB::table('master_pegawai')->insert([
            ["id_atasan" => 1, 'nip' =>  197406232000031001, 'namaDepan' => 'Hamzah', 'namaBelakang' => '', 'jabatan' => 'Wakil Ketua', 'pangkat' => 'Pembina Utama Muda', 'username' => 'hamzah', 'password' => 'hamzah123'],
#            ["id_atasan" => 1, 'nip' =>  199402112022032011, 'namaDepan' => 'Maya Anggraeni Rahmah', 'namaBelakang' => 'Permana', 'jabatan' => 'Klerek-Analis Perkara Peradilan', 'pangkat' => 'Penata Muda', 'username' => 'maya', 'password' => 'maya123'],
#            ['id_atasan' => 8, 'NIP' => 199310272020122009, 'Nama_Depan' => 'Faza', 'Nama_Belakang' => 'Faridah', 'Jabatan' => 'Pranata Komputer Ahli Pertama', 'Pangkat' => 'Penata Muda', 'Username' => 'faza', 'Password' => bcrypt('faza123')],
        ]);
    }

}
