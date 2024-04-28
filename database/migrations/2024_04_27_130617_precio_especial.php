<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('precio_especial', function (Blueprint $table) {
            $table->id(); // Primary key for the table
            $table->foreignId('cliente_id'); // Foreign key to the clientes table
            $table->foreignId('producto_id'); // Foreign key to the productos table
            $table->decimal('precio_especial', 8, 2); // Special price with precision and scale

            // Indexes for faster search
            $table->unique(['cliente_id', 'producto_id']); // Ensure unique combinations

            // Foreign key constraints
            $table->foreign('cliente_id')->references('id')->on('clientes')
                  ->onDelete('cascade'); // Deletes entry if cliente is deleted
            $table->foreign('producto_id')->references('codigo')->on('productos') // Assumes the primary key in productos is `codigo`
                  ->onDelete('cascade'); // Deletes entry if producto is deleted

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('precio_especial');
    }
};
