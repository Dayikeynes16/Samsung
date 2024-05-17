<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model 
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'precio', 'stock'];

    public $timestamps = false;

    protected $primaryKey = 'codigo';
    protected $table = 'productos';  
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'producto_ventas', 'producto_id', 'venta_id')
                    ->using(ProductoVenta::class);  
    }
}
