<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SepetUrun;
use Illuminate\Support\Facades\DB;

class SepetUrunController extends Controller
{
    public function getSepetUrun()
    {
        $data= SepetUrun::all();
        return response()->json($data);
    }

    public function postSepetUrun(Request $request)
    {
        $data = new SepetUrun();
        $data ->sepet_id=$request->input('sepet_id');
        $data ->urun_id=$request->input('urun_id');
        $data ->adet=$request->input('adet');
        $data ->tutar=$request->input('tutar');
        $data ->durum=$request->input('durum');
        $data->save();
        return response()->json($data);

    }

    public function getSepetUrunBySepet($sepet_id)
    {
        $data= DB::select('select * from sepet_urun where sepet_id = ?', [$sepet_id]);
        return response()->json($data);
    }

    public function updateSepetUrun(Request $request)
    {
        $id=$request->input('id');
        $sepet_id=$request->input('sepet_id');
        $urun_id=$request->input('urun_id');
        $adet=$request->input('adet');
        $tutar=$request->input('tutar');
        $durum=$request->input('durum');
        $data=DB::update('update sepet_urun set sepet_id=?, urun_id=?, adet=?, tutar=?,durum=? where id=?'//sepetaktif için
            , [$sepet_id,$urun_id,$adet,$tutar,$durum,$id]);
        return response()->json($data);
    }

    public function deleteSepet ($sepet_id)
    {
        $data=DB::delete('delete from sepet_urun where sepet_id = ?', [$sepet_id]);
        return response()->json($data);
    }

    public function deleteSepetUrun ($id)
    {
        $data=DB::delete('delete from sepet_urun where id = ?', [$id]);
        return response()->json($data);
    }
}
