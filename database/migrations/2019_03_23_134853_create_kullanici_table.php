<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Kullanici;

class CreateKullaniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('adsoyad',60);
            $table->string('email',150)->unique();
            $table->string('sifre',60);
            $table->string('aktivasyon_anahtari',60)->nullable();
            $table->boolean('aktif_mi')->default(0);
            $table->rememberToken();

            $table->timestamp('olusturulma_tarihi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncellenme_tarihi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON
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
        Schema::dropIfExists('kullanici');
    }
}
