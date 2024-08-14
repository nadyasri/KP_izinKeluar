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
        'tanggal',
        'keperluan',
        'status',
        'keterangan',
        'waktu_keluar',
        'waktu_kembali',
    ];

    public function pengirim() {
        return $this->belongsTo(User::class);
    }

    public function penerima() {
        return $this->belongsTo(Jabatan::class, 'groupId_penerima', 'groupId');
    }

}
