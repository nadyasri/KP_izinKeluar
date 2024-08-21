<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratCuti extends Model
{
    use HasFactory;

    protected $table = 'daftar_cuti';
    protected $primaryKey = 'id_izin';

    protected $fillable = [
        'groupId_penerima',
        'groupId_pengirim',
        'nip',
        'tanggal',
        'keperluan',
        'status',
        'keterangan',
        'waktu_keluar',
        'waktu_kembali',
    ];
}
