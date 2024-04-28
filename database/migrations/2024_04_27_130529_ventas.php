<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('operador')->nullable();
            $table->decimal('total', 8, 2)->default(0.00);
            $table->boolean('abierta');
            $table->boolean('finalizada');
            $table->enum('metodo_de_pago', ['Tarjeta', 'Transferencia', 'Efectivo'])->default('Efectivo');
            $table->timestamp('fecha')->nullable();
            $table->foreignId('cliente')->nullable()->constrained('clientes')->onDelete('set null');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
    