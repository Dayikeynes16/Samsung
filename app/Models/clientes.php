<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $fillable = ['name','nickname','direccion','telefono'];

    protected $table = 'Cliente';

    protected $primaryKey = 'id';



    public $timestamps = false;


}
