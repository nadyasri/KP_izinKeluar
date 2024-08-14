<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $fillable = [
        'groupId',
        'parentId',
        'jabatan'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'group_id', 'groupId');
    }

}
