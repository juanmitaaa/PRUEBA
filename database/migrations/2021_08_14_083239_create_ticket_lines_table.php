<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');//tiene que ser el mismo tipo de datos que la clave primaria en la otra tabla
            $table->unsignedBigInteger('product_id');//tiene que ser el mismo tipo de datos que la clave primaria en la otra tabla
            
            $table->foreign('ticket_id')->references('id')->on('tickets');//creación de la relación en MYSQL
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_lines');
    }
}
