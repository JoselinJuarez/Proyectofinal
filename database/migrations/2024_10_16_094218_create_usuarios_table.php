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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuarios');
            $table->string ('nombres');
            //$table->string('apellidos');
           // $table->string ('CI');
            //$table->string('correo');
            $table->string ('contrasena');
            //$table->string ('nonmbres');
           // $table->string('apellidos');
            //$table->string ('CI');
           // $table->string('direcion');
           // $table->string ('telefono');
           $table->string('estado');
           $table->string('rol');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
