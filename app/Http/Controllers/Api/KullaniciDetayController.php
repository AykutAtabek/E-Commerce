<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KullaniciDetay;
use Illuminate\Support\Facades\DB;

class KullaniciDetayController extends Controller
{
    public function getKullaniciDetay()
    {
        $data= KullaniciDetay::all();
        return response()->json($data);

    }

    public function postKullaniciDetay(Request $request)
    {
        $data = new KullaniciDetay();
        $data ->kullanici_id=$request->input('kullanici_id');
        $data->adres=$request->input('adres');
        $data->telefon=$request->input('telefon');
        $data->save();
        return response()->json($data);

    }

    public function getKullaniciDetayByKullaniciId($kullanici_id)
    {
        $user= DB::select('select * from kullanici_detay where kullanici_id= ?', [$kullanici_id]);
        return response()->json($user);
    }

    public function updateKullaniciDetay(Request $request)
    {
        $id=$request->input('id');
        $kullanici_id=$request->input('kullanici_id');
        $adres=$request->input('adres');
        $telefon=$request->input('telefon');
        $user=DB::update('update kullanici_detay set kullanici_id=?, adres=?, telefon=? where id = ?'
            , [$kullanici_id,$adres,$telefon,$id]);
        response()->json($user);
        return response()->json($user);
    }

    public function deleteKullaniciDetay($id)
    {
        $user=DB::delete('delete from kullanici_detay where id = ?', [$id]);
        return response()->json($user);
    }
}
