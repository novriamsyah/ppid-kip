<?php

namespace Modules\OlehInformasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OlehInformasi extends Model
{
    use HasFactory;

    protected $table = "peroleh_informasi";

    protected $fillable = ['cara_memperoleh_informasi'];
    
    protected static function newFactory()
    {
        return \Modules\OlehInformasi\Database\factories\OlehInformasiFactory::new();
    }
}
