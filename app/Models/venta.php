<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model  
{
    use HasFactory;
    protected $fillable = ['operador', 'total', 'abierta', 'finalizada', 'metodo_de_pago', 'fecha'];

    protected $table = 'ventas';  
    public $timestamps = false;

    public function productoventas()
    {
        return $this->hasMany(ProductoVenta::class, 'venta_id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'producto_ventas', 'venta_id', 'producto_id')
                    ->withPivot('cantidad', 'subtotal');
    }
}
