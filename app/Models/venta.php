<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clientes;

class Venta extends Model  
{
    use HasFactory;
    protected $fillable = ['operador', 'total', 'abierta', 'finalizada', 'metodo_de_pago', 'fecha','cliente'];

    protected $table = 'ventas';  
    protected $primarykey = 'id';
    public $timestamps = false;

    public function productoventas(){    
        return $this->hasMany(ProductoVenta::class, 'venta_id');
    }

    public function cliente() {
        return $this->belongsTo(Clientes::class, 'cliente');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class, 'producto_ventas', 'venta_id', 'producto_id')
                    ->withPivot('cantidad', 'subtotal');
    }
}
