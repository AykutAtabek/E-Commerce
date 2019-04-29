<?php

use Illuminate\Database\Seeder;
use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use Illuminate\Support\Facades\DB;

class KullaniciTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kullanici::truncate();
        KullaniciDetay::truncate();

        $kullanici_yonetici = Kullanici::create([
           'adsoyad'     => 'Aykut Evren Atabek',
           'email'       => 'aykutatabek@eticaret.com',
           'sifre'       => bcrypt('123456'),
           'aktif_mi'    => 1,
           'yonetici_mi' => 1,
        ]);
        $kullanici_yonetici->detay()->create([
            'adres'     => 'Arhavi',
            'telefon'   => '05456452313',
        ]);

        for( $i=0; $i<50; $i++)
        {
            $kullanici_yonetici = Kullanici::create([
                'adsoyad'     => $faker->name,
                'email'       => $faker->unique()->safeEmail,
                'sifre'       => bcrypt('123456'),
                'aktif_mi'    => 1,
                'yonetici_mi' => 0,
            ]);
            $kullanici_yonetici->detay()->create([
                'adres'     => $faker->address,
                'telefon'   => $faker->e164PhoneNumber,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
