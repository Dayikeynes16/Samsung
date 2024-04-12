<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class precioespecial extends Pivot
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'producto_id', 'precio_especial'];

    protected $table = 'PrecioEspecial';
    public $timestamps = false;


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(clientes::class,'cliente_id');
    }

}
