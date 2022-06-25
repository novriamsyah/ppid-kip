<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisIdentitas extends Model
{
    use HasFactory;

    protected $table = "jenis_identitas";

    protected $fillable = ['id_jenis_pemohon', 'jenis_identitas'];
    
    protected static function newFactory()
    {
        return \Modules\Auth\Database\factories\JenisIdentitasFactory::new();
    }
}
