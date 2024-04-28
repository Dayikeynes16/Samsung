<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model  
{
    use HasFactory;
    protected $fillable = ['nombre', 'nickname', 'direccion', 'telefono'];

    protected $table = 'clientes';  

    public $timestamps = false;  
}


