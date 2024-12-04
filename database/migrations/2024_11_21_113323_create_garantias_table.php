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
        Schema::create('garantias', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('prestamo_id')->constrained('prestamos')->onDelete('cascade');
            $table->decimal('valor', 10, 2)->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['En garantía', 'Vendido', 'Devuelto'])->default('En garantía');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garantias');
    }
};
