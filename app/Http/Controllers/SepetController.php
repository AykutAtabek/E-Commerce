<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Urun;

class SepetController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index(){
        return view('sepet');
    }

    public function ekle()
    {
        $urun = Urun::find(request('id'));
        Cart::add($urun->id,$urun->urun_adi,1,$urun->fiyati,['slug'=>$urun->slug]);

        return redirect()->route('sepet')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün Sepete Eklendi.');
    }
}
