<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketTable extends Migration
{
    /** * Run the migrations. * * @return void */
    public function up()
    {
        Schema::create('market', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50);
            $table->string('market_adi', 50);
            $table->timestamp('olusturulma_tarihi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncellenme_tarihi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('silinme_tarihi')->nullable();
        });
    }

    /** * Reverse the migrations. * * @return void */
    public function down()
    {
        Schema::dropIfExists('market');
    }
}