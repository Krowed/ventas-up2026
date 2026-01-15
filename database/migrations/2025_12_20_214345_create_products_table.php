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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_interno')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->string('codigo_sunat');
            $table->string('descripcion');
            $table->integer('idmarca')->nullable();
            $table->integer('idcategoria')->nullable();
            $table->integer('idunidad');
            $table->string('idcodigo_igv');
            $table->float('igv');
            $table->decimal('precio_compra', 18, 2);
            $table->decimal('precio_venta', 18, 2);
            $table->integer('impuesto');
            $table->date('fecha_vencimiento')->nullable();
            $table->integer('opcion')->nullable();
            $table->integer('stock_actual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
