<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('categoria')->nullable();
            $table->string('codigo_barras')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            
            $table->text('descripcion')->nullable();
            $table->string('foto')->nullable();
            $table->decimal('precio_compra', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->decimal('margen', 10, 2)->nullable();
            $table->decimal('ganancia', 10, 2)->nullable();
            $table->decimal('cantidad_existencia', 10, 2);
            $table->decimal('cantidad_minima', 10, 2)->nullable();
            $table->enum('unidad', ['kilogramos', 'piezas']); 
            $table->timestamps();
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
