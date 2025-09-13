<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id_user
 * @property string $password
 * @property-read string|null $decrypted_password
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $appends   = ['decrypted_password'];

    protected $fillable = [
        'nip',
        'nama',
        'Users_groupId',
        'pangkat',
        'username',
        'password',
        'role',
        'photo'
    ];

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

#    public function pegawai()
#    {
#        return $this->hasOne(Pegawai::class, 'username', 'username');
#    }

#    public function atasan()
#    {
#        return $this->hasOne(Atasan::class, 'username', 'username');
#    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'Users_groupId', 'groupId');
    }

    public function suratIzinDikirim()
    {
        return $this->hasMany(SuratIzin::class, 'groupId_pengirim', 'Users_groupId');
    }

    public function getDecryptedPasswordAttribute(): ?string
    {
        try {
            return Crypt::decryptString($this->attributes['password']);
        } catch (DecryptException $e) {
            Log::warning("Decryption error for user {$this->getKey()}: {$e->getMessage()}");
            return 'Invalid encrypted data';              
        }
    }
}
