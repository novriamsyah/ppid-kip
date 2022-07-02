<?php

namespace Modules\Pekerjaan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelompokPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $fillable = ['jenis_kerja'];
    
    protected static function newFactory()
    {
        return \Modules\Pekerjaan\Database\factories\KelompokPekerjaanFactory::new();
    }
}
