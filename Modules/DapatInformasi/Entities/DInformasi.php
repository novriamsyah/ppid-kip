<?php

namespace Modules\DapatInformasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class D_Informasi extends Model
{
    use HasFactory;

    protected $table = "dapat_informasi";

    protected $fillable = ['cara_dapat_informasi'];
    
    protected static function newFactory()
    {
        return \Modules\DapatInformasi\Database\factories\DInformasiFactory::new();
    }
}
