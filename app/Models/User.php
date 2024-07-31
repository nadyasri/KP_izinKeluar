<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'users';
    
    protected $fillable = [
        'nip',
        'namaDepan',
        'namaBelakang',
        'jabatan',
        'pangkat',
        'username',
        'password',
        'role',
        'nip',
        'pangkat',
        'jabatan',
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'username', 'username');
    }

    public function atasan()
    {
        return $this->hasOne(Atasan::class, 'username', 'username');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's role type.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */

}
