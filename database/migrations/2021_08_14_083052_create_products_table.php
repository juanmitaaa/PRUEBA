<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ean');
            $table->string('designation');
            $table->float('price',8,2);//https://laravel.com/docs/8.x/migrations#column-method-float
            $table->tinyInteger('warranty');
            $table->unsignedBigInteger('manufacturer_id');

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');//creación de la relación en MYSQL
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
        Schema::dropIfExists('products');
    }
}
