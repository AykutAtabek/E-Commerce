<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('slug',150);
            $table->string('urun_adi',150);
            $table->text('aciklama');
            $table->decimal('fiyati',6,3);
            $table->timestamp('olusturulma_tarihi')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncellenme_tarihi')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('silinme_tarihi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urun');
    }
}
