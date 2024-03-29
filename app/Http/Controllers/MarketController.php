<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Kategori;
use App\Models\Urun;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index($slug_marketadi){
        $kategoriler = Kategori::whereRaw('ust_id is null')->take(8)->get();
        $urunler_slider = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun_id')
            ->where('urun_detay.goster_slider', 1)
            ->orderBy('guncellenme_tarihi', 'desc')
            ->take(5)->distinct()->get();

        $urun_gunun_firsati = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun_id')
            ->where('urun_detay.goster_gunun_firsati', 1)
            ->orderBy('guncellenme_tarihi', 'desc')
            ->distinct()->first();

        $urunler_one_cikan = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun_id')
            ->where('urun_detay.goster_one_cikan', 1)
            ->orderBy('guncellenme_tarihi', 'desc')
            ->take(8)->distinct()->get();
        $urunler_cok_satan = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun_id')
            ->where('urun_detay.goster_cok_satan', 1)
            ->orderBy('guncellenme_tarihi', 'desc')
            ->take(8)->distinct()->get();

        $urunler_indirimli = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun_id')
            ->where('urun_detay.goster_indirimli', 1)
            ->orderBy('guncellenme_tarihi', 'desc')
            ->take(8)->distinct()->get();

        $marketler = Market::select('market.*')->get();
        $market = Market::where('slug', $slug_marketadi)->firstorFail();

        return view('anasayfa',compact('kategoriler','marketler','market','urun_gunun_firsati'
        ,'urunler_slider','urunler_one_cikan','urunler_cok_satan','urunler_indirimli'));
    }
}