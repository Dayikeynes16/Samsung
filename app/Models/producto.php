<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class producto extends Model
{
    use HasFactory;
    protected $fillable = ['codigo','nombre','precio'];


    public $timestamps = false;

    protected $primaryKey = 'codigo';

    protected $table = 'Producto';
    public function ventas()
{
    return $this->belongsToMany(Venta::class, 'ProductoVenta', 'producto_id', 'venta_id');
}

}
