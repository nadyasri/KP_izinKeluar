<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    use HasFactory;

    protected $table = 'daftar_izin';
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

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'groupId_pengirim', 'Users_groupId');
    }

    public function penerima()
    {
        return $this->belongsTo(Jabatan::class, 'groupId_penerima', 'groupId');
    }

}
