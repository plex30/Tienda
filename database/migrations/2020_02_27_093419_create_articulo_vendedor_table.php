<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloVendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_vendedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('articulo_id')->unsigned();
            $table->bigInteger('vendedor_id')->unsigned();
            $table->date('fecha_venta');
            $table->integer('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign("articulo_id")
                ->references("id")
                ->on("articulos")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("vendedor_id")
            ->references("id")
            ->on("vendedors")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_vendedor');
    }
}
