<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PrecioEspecial extends Pivot  // Model name should follow StudlyCaps convention
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'producto_id', 'precio_especial'];

    protected $table = 'precio_especial';  // Table name should be snake_case and match the migration exactly
    public $timestamps = false;

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');  // Use the correct class name if it's 'Cliente'
    }
}
