<?php

namespace Modules\Login\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory;
    protected $table = "register";
    protected $guard = 'regis_guard';
    protected $connection = 'regis_guard';
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Login\Database\factories\LoginFactory::new();
    }
}
