<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function getKategori()
    {
        $data= Kategori::all();
        return response()->json($data);
    }

    public function postKategori(Request $request)
    {
        $data = new Kategori();
        $data ->kategori_adi=$request->input('kategori_adi');
        $data->save();
        return response()->json($data);
    }
    public function getKategoriById($id)
    {
        $data= DB::select('select * from kategori where id = ?', [$id]);
        return response()->json($data);
    }

    public function updateKategori(Request $request)
    {
        $id=$request->input('id');
        $kategori_adi=$request->input('kategori_adi');
        $data=DB::update('update kategori set kategori_adi=? where id = ?'
            , [$kategori_adi,$id]);
        return response()->json($data);
    }

    public function deleteKategori($id)
    {
        $data=DB::delete('delete from kategori where id = ?', [$id]);
        return response()->json($data);
    }
}
