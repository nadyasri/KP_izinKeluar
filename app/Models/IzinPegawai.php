<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Database\Migrations\master_pegawai;

class IzinPegawai extends Model
{
    use HasFactory;

    protected $table = 'daftar_izin';
    protected $primaryKey = 'id_izin';
    protected $fillable = ['keperluan', 'tanggal', 'waktu_keluar', 'waktu_kembali'];
}
