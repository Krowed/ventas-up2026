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
        Schema::create('kardexes', function (Blueprint $table) {
            $table->id();
            // Relaciones principales
            $table->integer('idproducto');
            $table->integer('idalmacen');

            // Movimiento
            $table->string('tipo_movimiento');
            // COMPRA | VENTA | AJUSTE | TRASLADO | DEVOLUCION

            $table->string('documento')->nullable();
            // FACTURA | BOLETA | NOTA_VENTA | GUIA | AJUSTE

            $table->integer('iddocumento')->nullable();
            // id de buys, billings, sale_notes, etc.

            // Cantidades
            $table->decimal('entrada', 18, 2)->default(0);
            $table->decimal('salida', 18, 2)->default(0);

            // Control de stock
            $table->decimal('stock_anterior', 18, 2);
            $table->decimal('stock_actual', 18, 2);

            // Auditoría
            $table->dateTime('fecha');
            $table->integer('idusuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kardexes');
    }
};
