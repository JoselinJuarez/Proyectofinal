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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamos');
            $table->string('fecha_de_inicio');
            $table->string ('fecha_de_fin');
            //$table->id('id_prestamos');
            $table->string('montos');
            $table->string ('periodo');
            $table->string ('var');
            $table->int('pre_id_cliente');
           $table->foreign('pre_id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
