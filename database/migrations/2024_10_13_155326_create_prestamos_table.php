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
            //$table->string('Nombre');
            $table->timestamp('fecha_de_inicio')->useCurrent();
            $table->date('fecha_de_fin');
            //$table->id('id_prestamos');
            $table->integer('montos');
            $table->string ('periodo');
            //$table->string ('var');
            $table->unsignedBigInteger('pre_id_cliente');
           $table->foreign('pre_id_cliente')
           ->references('ci')->on
           ('clientes')->onDelete('cascade');

           //$table->unsignedBigInteger('pre_id_objeto');

          // $table->foreign('pre_id_objeto')
          // ->references('id_objeto')->on
          // ('objetos')->onDelete('cascade');
            

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
