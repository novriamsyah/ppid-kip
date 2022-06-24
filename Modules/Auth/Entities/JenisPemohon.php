<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPemohon extends Model
{
    use HasFactory;

    protected $table = "jenis_pemohon";

    protected $fillable = ['jenis_pemohon'];
    
    protected static function newFactory()
    {
        return \Modules\Auth\Database\factories\JenisPemohonFactory::new();
    }
}
