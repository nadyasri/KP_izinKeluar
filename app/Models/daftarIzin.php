<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarIzin extends Model
{
    use HasFactory;

    protected $table = 'daftar_izin';
    protected $primaryKey = 'id_izin';

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function atasan() {
        return $this->belongsTo(Atasan::class, 'id_atasan', 'id_atasan');
    }

}
