<?php

namespace Modules\Template\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $table = 'template_email';

    protected $guard = [];

    protected $fillable = ['kategori', 'isi'];
    
    protected static function newFactory()
    {
        return \Modules\Template\Database\factories\TemplateFactory::new();
    }
}
