<?php

namespace Modules\Identitas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisIdentitas extends Model
{
    use HasFactory;

    protected $table = "jenis_identitas";

    protected $fillable = ['id_jenis_pemohon', 'jenis_identitas'];
    
    protected static function newFactory()
    {
        return \Modules\Identitas\Database\factories\JenisIdentitasFactory::new();
    }
}
