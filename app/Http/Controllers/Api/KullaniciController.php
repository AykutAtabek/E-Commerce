<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kullanici;
use Illuminate\Support\Facades\DB;

class KullaniciController extends Controller
{
    public function getUser()
    {
        $data= Kullanici::all();
        return response()->json($data);

    }

    public function postUser(Request $request)
    {
        $data = new Kullanici();
        $data ->adsoyad=$request->input('adsoyad');
        $data->email=$request->input('email');
        $data->sifre=$request->input('sifre');
        $data->aktivasyon_anahtari= Str::random(60);
        $data->aktif_mi=1;
        $data->save();
        return response()->json($data);

    }

    public function getUserById($id)
    {
        $user= DB::select('select * from kullanici where id= ?', [$id]);
        return response()->json($user);
    }

    public function updateUser(Request $request)
    {
        $id=$request->input('id');
        $adsoyad=$request->input('adsoyad');
        $email=$request->input('email');
        $sifre=$request->input('sifre');
        $aktivasyon_anahtari= Str::random(60);
        $aktif_mi=1;
        $user=DB::update('update kullanici set adsoyad=?, email=?, sifre=? where id = ?'
            , [$adsoyad,$email,$sifre,$aktivasyon_anahtari,$aktif_mi,$id]);
        response()->json($user);
        return response()->json($user);
    }

    public function deleteUser(Request $request)
    {
        $email=$request->input('email');
        $user=DB::delete('delete from kullanici where id = ?', [$email]);
        response()->json($user);
        return response()->json($user);
    }

    public function userLogin(Request $request)
    {
        $email=$request->input('email');
        $sifre=$request->input('sifre');
        $user=DB::select('select KullaniciID from kullanici where id = ? and sifre=?', [$email,$sifre]);
        return response()->json($user);
    }
}
