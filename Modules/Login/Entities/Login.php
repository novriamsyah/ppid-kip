<?php

namespace Modules\Login\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = "register";
    protected $guard = 'reg_user';
    protected $connection = 'reg_user';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'pass',
        'jenis_pemohon',
        'jenis_identitas',
        'nomor_identitas',
        'file_identitas',
        'npwp',
        'pekerjaan',
        'alamat',
        'telp',
        'ket'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Login\Database\factories\LoginFactory::new();
    }
}
