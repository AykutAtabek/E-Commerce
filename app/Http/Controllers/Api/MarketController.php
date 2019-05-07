<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function getMarket()
    {
        $data= Market::all();
        return response()->json($data);
    }

    public function postMarket(Request $request)
    {
        $data = new Market();
        $data ->market_adi=$request->input('market_adi');
        $data->save();
        return response()->json($data);

    }
    public function getMarketById($id/*Request $request*/) //Hangi yöntemi kullanmam daha doğru olur??
    {
        //$MarketID=$request->input('MarketID');
        $data= DB::select('select * from market where id = ?', [$id]);
        return response()->json($data);
    }

    public function updateMarket(Request $request)
    {
        $id=$request->input('id');
        $market_adi=$request->input('market_adi');
        $data=DB::update('update market set market_adi=? where id = ?'
            , [$market_adi,$id]);
        return response()->json($data);
    }

    public function deleteMarket($id)
    {
        $data=DB::delete('delete from market where id = ?', [$id]);
        return response()->json($data);
    }
}
