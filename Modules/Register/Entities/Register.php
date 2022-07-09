<?php

namespace Modules\Register\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Register extends Model
{
    use HasFactory;

    protected $table = "register";

    protected $guard = 'regis_guard';

    protected $guarded = [];

    protected $casts = [
        'jenis_identitas' => 'array',
        'nomor_identitas' => 'array',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Register\Database\factories\RegisterFactory::new();
    }
}
