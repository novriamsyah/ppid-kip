<?php

namespace Modules\Register\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable 
{
    use HasFactory;

    protected $table = "register";

    protected $guard = 'daftar';

    protected $guarded = [];
    
    protected $fillable = [
        'nama_lengkap',
        'email',
        'email_verifikasi',
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

    protected $casts = [
        'jenis_identitas' => 'array',
        'nomor_identitas' => 'array',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Register\Database\factories\RegisterFactory::new();
    }
}
