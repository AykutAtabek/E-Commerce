<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MarketUrun;
use Illuminate\Support\Facades\DB;
use App\Models\Urun;

class MarketUrunController extends Controller
{
    public function getMarketUrun()
    {
        $data= MarketUrun::all();
        return response()->json($data);
    }

    public function postMarketUrun(Request $request)
    {
        $data = new MarketUrun();
        $data ->urun_id=$request->input('urun_id');
        $data ->kategori_id=$request->input('kategori_id');
        $data ->market_id=$request->input('market_id');
        $data->save();
        return response()->json($data);

    }
    public function getMarketUrunByMarketId($market_id)
    {
        $data= DB::select('select * from market_urun where market_id = ?', [$market_id]);
        return response()->json($data);
    }
   public function getUrunByMarketId($market_id)
    {
        $data= DB::select('select u.urun_adi from market_urun inner join urun u on market_urun.urun_id = u.id where market_id = ?', [$market_id]);
        return response()->json($data);
    }

    public function getUrunKategoriByMarketId($market_id,$kategori_id)
    {
        $data= DB::select('select u.urun_adi from market_urun 
          inner join urun u on market_urun.urun_id = u.id 
          where market_id = ? and kategori_id=?', [$market_id,$kategori_id]);
        return response()->json($data);
    }


    public function getMarketUrunByUrun($urun_id)
    {
        $data=DB::select('select * from market_urun where urun_id=?',[$urun_id]);
        return response()->json($data);

    }

    public function updateMarketUrun(Request $request)
    {
        $market_id=$request->input('market_id');
        $urun_id=$request->input('urun_id');
        $kategori_id=$request->input('kategori_id');
        $id=$request->input('id');
        $data=DB::update('update market_urun set urun_id=? , kategori_id=? , market_id=? where id = ?'
            , [$urun_id,$kategori_id,$market_id,$id]);
        return response()->json($data);
    }

    public function deleteMarketUrun ($id)
    {
        $data=DB::delete('delete from market_urun where id = ?', [$id]);
        return response()->json($data);
    }
}
