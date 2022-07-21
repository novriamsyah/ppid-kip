<?php

namespace Modules\PermintaanUser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan_users';
    protected $fillable = [
        'id_user_minta',
       'mendapatkan',
       'memperoleh',
       'ppid_tujuan',
        'isi',
        'tujuan',
        'dokumen',
        'pendukung',
       'dikuasakan',
        'nama_kuasa',
        'nik_kuasa',
        'kontak_kuasa',
        'alamat_kuasa',
        'doc_kuasa',
        'identitas_kuasa',
        'noreg',
        'jatuh_tempo',
        'status',
        'tgl_kirim',
        'lama',
        'file_tertulis',
        'alasan',
    ];
    
    protected static function newFactory()
    {
        return \Modules\PermintaanUser\Database\factories\PermintaanFactory::new();
    }
}
