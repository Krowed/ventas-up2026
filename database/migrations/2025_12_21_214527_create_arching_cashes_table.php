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
        Schema::create('arching_cashes', function (Blueprint $table) {
            $table->id();
            $table->integer('idcaja');
            $table->integer('idusuario');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->decimal('monto_inicial', 10, 2);
            $table->decimal('monto_final', 10, 2)->nullable();
            $table->integer('cantidad_ventas');
            $table->decimal('deposito', 10, 2)->default(0);
            $table->tinyInteger('estado')->default(1); // 1 abierto, 2 cerrado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arching_cashes');
    }
};
