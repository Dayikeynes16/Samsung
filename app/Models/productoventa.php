<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductoVenta extends Pivot
{
    use HasFactory;  // Ensuring factory usage is stated for consistency

    protected $table = 'producto_ventas';  // This needs to match the table name in the migration
    protected $fillable = ['producto_id', 'venta_id', 'cantidad', 'subtotal'];

    public $timestamps = false;  // Correct as timestamps are not needed

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    
}
