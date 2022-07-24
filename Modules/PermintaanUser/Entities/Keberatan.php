<?php

namespace Modules\PermintaanUser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keberatan extends Model
{
    use HasFactory;

    protected $table = 'keberatan_user';
    protected $fillable = [
       'id_permintaan',
           'noreg_keberatan',
           'alasan',
           'detail_alasan',
          'jatuh_tempo',
           'status',
           'pendukung',
           'f_identitas',
           'tanggapan',
    ];
    
    protected static function newFactory()
    {
        return \Modules\PermintaanUser\Database\factories\KeberatanFactory::new();
    }
}
