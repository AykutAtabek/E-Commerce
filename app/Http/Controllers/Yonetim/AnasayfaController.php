<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnasayfaController extends Controller
{
    public function index()
    {
        $bekleyen_siparis = Siparis::where('durum','Siparişiniz Alındı')->count();
        return view('yonetim.anasayfa', compact('bekleyen_siparis'));
    }
}
