<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nip', 'pangkat', 'Tanggal', 'Waktu_keluar', 'Waktu_kembali', 'Keperluan'
    ];
}