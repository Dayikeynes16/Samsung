<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $fillable = ['operador','finalizada','total', 'abierta','metodo_de_pago'];

    protected $table = 'Venta';

    public $timestamps = false;

    public function productoventas()
    {
        return $this->hasMany(ProductoVenta::class, 'venta_id');
    }
    protected $primaryKey = 'id_venta';
    public function productos()
{
    return $this->belongsToMany(Producto::class, 'ProductoVenta', 'venta_id', 'producto_id')
                ->withPivot('cantidad', 'subtotal');
    
}

}
