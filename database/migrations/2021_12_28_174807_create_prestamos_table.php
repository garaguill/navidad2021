<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->integer('socio_id')->unsigned();
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');;
            $table->integer('libro_id')->unsigned();
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');;
            $table->date('f_inicial')->nullable();
            $table->date('f_final')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
