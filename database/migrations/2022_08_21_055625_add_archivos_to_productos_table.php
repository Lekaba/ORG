<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivosToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_productos_id')->nullable();
            $table->foreign('archivos_productos_id')->references('id')->on('archivos_productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_productos_id')->nullable();
            $table->foreign('archivos_productos_id')->references('id')->on('archivos_productos')->onDelete('cascade');
        });
    }
}
