<?php

namespace Modules\PPIDtujuan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TujuanPpid extends Model
{
    use HasFactory;

    protected $table = "ppid_tujuan";

    protected $fillable = ['tujuan_ppid'];
    
    protected static function newFactory()
    {
        return \Modules\PPIDtujuan\Database\factories\TujuanPpidFactory::new();
    }
}
