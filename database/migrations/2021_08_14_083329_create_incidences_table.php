<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->id();
            $table->string('warranty_period')->nullable();
            $table->string('components')->nullable();
            $table->tinyInteger('complete_products')->nullable();
            $table->string('reason')->nullable();
            $table->string('repair_cost')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('ticket_line_id');

            $table->foreign('state_id')->references('id')->on('states');//creación de la relación en MYSQL
            $table->foreign('ticket_line_id')->references('id')->on('ticket_lines');//creación de la relación en MYSQL
            
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
        Schema::dropIfExists('incidences');
    }
}
