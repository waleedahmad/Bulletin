<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('row');
            $table->integer('col');
            $table->integer('size_x');
            $table->integer('size_y');
            $table->integer('board_id')->unsigned();
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
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
        Schema::dropIfExists('layout_info');
    }
}
