<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siparis;
use Illuminate\Support\Facades\DB;

class SiparisController extends Controller
{
    public function getSiparis()
    {
        $data= Siparis::all();
        return response()->json($data);
    }

    public function postSiparis(Request $request)
    {
        $data = new Siparis();
        $data ->sepet_id=$request->input('sepet_id');
        $data ->siparis_tutari=$request->input('siparis_tutari');
        $data ->adsoyad=$request->input('adsoyad');
        $data ->adres=$request->input('adres');
        $data ->telefon=$request->input('telefon');
        $data ->banka=$request->input('banka');
        $data ->taksit_sayisi=$request->input('taksit_sayisi');
        $data ->durum=$request->input('durum');
        $data->save();
        return response()->json($data);

    }
    public function getSiparisById($id)
    {
        $data= DB::select('select * from siparis where id = ?', [$id]);
        return response()->json($data);
    }

    public function updateSiparis(Request $request)
    {
        $id=$request->input('id');
        $sepet_id=$request->input('sepet_id');
        $siparis_tutari=$request->input('siparis_tutari');
        $adsoyad=$request->input('adsoyad');
        $adres=$request->input('adres');
        $telefon=$request->input('telefon');
        $banka=$request->input('banka');
        $taksit_sayisi=$request->input('taksit_sayisi');
        $durum=$request->input('durum');
        $data=DB::update('update siparis set sepet_id=?,siparis_tutari=?,adsoyad=?,adres=?,telefon=?,banka=?,taksit_sayisi=?,durum=?
            where id = ?'
            , [$sepet_id,$siparis_tutari,$adsoyad,$adres,$telefon,$banka,$taksit_sayisi,$durum,$id]);
        return response()->json($data);
    }
    public function updateSiparisDurumID($durum, $id)
    {
        $data=DB::update('update siparis set  durum=? where id = ?', [$durum,$id]);
        /*if($data[0]!=null&&durum==4)  AKTİF OLMA DURUMU??
        {
            DB::update('update siparis set  isActive=true where SiparisID = ?', [$SiparisID]);
        }*/
        return response()->json($data);
    }

    public function deleteSiparis ($id)
    {
        $data=DB::delete('delete from siparis where İD = ?', [$id]);
        return response()->json($data);
    }

    /*public function getSiparisByKullaniciID($KullaniciID)
    {
        $data=DB::select('select * from siparis where KullaniciID=?',[$KullaniciID]);
        return response()->json($data);
    }*/

    /*public function getAktifSiparisByKullaniciID($KullaniciID)
    {
        $data=DB::select('select * from siparisler where KullaniciID=? and isActive=true',[$KullaniciID]);
        return response()->json($data);
    }

    public function getAllAktifSiparis()
    {
        $data=DB::select('select * from siparisler where isActive=true');
        return response()->json($data);
    }

    public function getSiparisBySubeID($SubeID)
    {
        $data=DB::select('select * from siparisler where SubeID = ?', [$SubeID]);
        return response()->json($data);
    }*/

    public function getSiparisBySiparisDurum($durum)
    {
        $data=DB::select('select * from siparis where durum = ?', [$durum]);
        return response()->json($data);
    }
}
