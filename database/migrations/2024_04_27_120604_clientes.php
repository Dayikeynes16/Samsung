<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nickname')->nullable();  // Corrected typo and recommended naming
            $table->string('direccion')->nullable();
            $table->string('telefono')->unique();
            $table->decimal('credito', 8, 2)->nullable()->default(0.00);  // Specified precision and scale
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
