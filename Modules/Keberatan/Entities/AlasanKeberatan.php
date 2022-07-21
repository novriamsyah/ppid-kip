<?php

namespace Modules\Keberatan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlasanKeberatan extends Model
{
    use HasFactory;

    protected $table = "alasan_keberatan";

    protected $fillable = ['alasan_keberatan'];
    
    protected static function newFactory()
    {
        return \Modules\Keberatan\Database\factories\AlasanKeberatanFactory::new();
    }
}
