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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ci');
            $table->string('nombres');
            $table->string('apellidos');
           // $table->integer('ci');
            $table->integer('celular');
            $table->integer('estado');
            //$table->integer('rol');
           // $table->id();
            //$table->id('direccion');
           //$table->string('direccion_de_trabajo');
            //$table->idstring('direccion_de_trabajoo');
            
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
