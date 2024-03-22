<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductoVenta extends Pivot
{
    protected $table = 'ProductoVenta';
    protected $fillable = ['producto_id', 'venta_id', 'cantidad', 'subtotal'];

    public $timestamps = false;
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
