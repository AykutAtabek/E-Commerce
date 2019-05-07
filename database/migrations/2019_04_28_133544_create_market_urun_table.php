<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketUrunTable extends Migration
{
    /** * Run the migrations. * * @return void */
    public function up()
    {
        Schema::create('market_urun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned()->nullable();
            $table->integer('kategori_id')->unsigned()->nullable();
            $table->integer('market_id')->unsigned()->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
            $table->foreign('market_id')->references('id')->on('market')->onDelete('cascade');
        });
    }

    /** * Reverse the migrations. * * @return void */
    public function down()
    {
        Schema::dropIfExists('market_urun');
    }
}