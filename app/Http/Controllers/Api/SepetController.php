<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sepet;
use Illuminate\Support\Facades\DB;

class SepetController extends Controller
{
    public function getSepet()
    {
        $data= Sepet::all();
        return response()->json($data);
    }

    public function postSepet(Request $request)
    {
        $data = new Sepet();
        $data ->kullanici_id=$request->input('kullanici_id');
        //$data ->isSepetAktif=$request->input('isSepetAktif');
        $data->save();
        return response()->json($data);

    }
    public function getSepetByKullaniciId($kullanici_id)
    {
        $data= DB::select('select * from sepet where kullanici_id = ?', [$kullanici_id]);
        return response()->json($data);
    }

    public function updateSepet(Request $request)
    {
        $id=$request->input('SepetID');
        $kullanici_id=$request->input('$kullanici_id');
        //$isSepetAktif=$request->input('isSepetAktif');
        $data=DB::update('update sepet set kullanici_id=?, /*isSepetAktif=?*/ where id=?'//sepetaktif için????
            , [$kullanici_id/*,$isSepetAktif*/,$id]);
        return response()->json($data);
    }

    public function deleteSepet ($id)
    {
        $data=DB::delete('delete from sepet where id = ?', [$id]);
        return response()->json($data);
    }

    /*public function aktifSepet($kullanici_id)
    {
        $data=DB::select('select * from sepet where  kullanici_id= ? and isSepetAktif=1', [$kullanici_id]);
        return response()->json($data);
    }*/
}
