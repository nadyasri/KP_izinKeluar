<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atasan extends Model
{
    use HasFactory;

    protected $table = 'master_atasan';
    protected $primaryKey = 'id_atasan';
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
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_atasan', 'id_atasan');
    }
    
}
