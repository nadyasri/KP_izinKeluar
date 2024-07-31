<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'master_pegawai';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'namaDepan',
        'namaBelakang',
        'jabatan',
        'pangkat',
        'username',
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
    public function atasan()
    {
        return $this->belongsTo(Atasan::class, 'id_atasan', 'id_atasan');
    }

   # public function izin()
    #{
     #   return $this->hasMany(daftarIzin::class, 'id_pegawai', 'id_pegawai');
    #}
}
