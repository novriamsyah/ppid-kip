<?php

namespace Modules\Register\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VerifyUser extends Model
{
    use HasFactory;

    protected $table = 'verify_users';

    protected $fillable = [
        'user_id',
        'token'
    ];

    protected function pengguna() 
    {
        return $this->belongsTo(Register::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Register\Database\factories\VerifyUserFactory::new();
    }
}
