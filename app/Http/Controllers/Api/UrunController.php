<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urun;
use Illuminate\Support\Facades\DB;

class UrunController extends Controller
{
    public function getUrun()
    {
        $data= Urun::all();
        return response()->json($data);
    }

    public function postUrun(Request $request)
    {
        $data = new Urun();
        $data ->urun_adi=$request->input('urun_adi');
        $data ->aciklama=$request->input('aciklama');
        $data ->fiyati=$request->input('fiyati');
        $data ->slug=$request->input('slug');//?????
        $data->save();
        return response()->json($data);

    }
    public function getUrunById($id)
    {
        $data= DB::select('select * from urun where id = ?', [$id]);
        return response()->json($data);
    }

    public function updateUrun(Request $request)
    {
        $id=$request->input('id');
        $urun_adi=$request->input('urun_adi');
        $aciklama=$request->input('aciklama');
        $fiyati=$request->input('fiyati');
        $slug=$request->input('slug');
        $data=DB::update('update urun set slug=?, urun_adi=?,aciklama=?,fiyati=?
            where id = ?'
            , [$slug,$urun_adi,$aciklama,$fiyati,$id]);
        return response()->json($data);
    }

    public function deleteUrun ($id)
    {
        $data=DB::delete('delete from urun where id = ?', [$id]);
        return response()->json($data);
    }

    /*public function getUrunByKategori($UrunKategoriID)
    {
        $data=DB::select('select * from urunler where UrunKategoriID=?',[$UrunKategoriID]);
        return response()->json($data);
    }*/

    public function getUrunByUrunAdi(Request $request)
    {
        $urun_adi=$request->input('urun_adi');
        $data=DB::select('select * from urun where urun_adi LIKE "%?%"',[$urun_adi]);
        return response()->json($data);
    }

}
