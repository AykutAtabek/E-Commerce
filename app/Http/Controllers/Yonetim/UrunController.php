<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Urun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrunController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan'))
        {
            request()->flash();
            $aranan = request('aranan');
            $list = Urun::where('urun_adi','like',"%$aranan%")
                ->orWhere('aciklama','like',"%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan',$aranan);
        }
        else{
            $list = Urun::orderByDesc('id')->paginate(8);
        }
        return view('yonetim.urun.index', compact('list'));
    }

    public function form($id= 0)
    {
        $entry = new Urun;
        if($id>0){
            $entry = Urun::find($id);
        }
        return view('yonetim.urun.form', compact('entry'));
    }

    public function kaydet($id= 0)
    {
        $data = request()->only('urun_adi','slug','aciklama','fiyati');
        if(!request()->filled('slug')) {
            $data['slug'] = str_slug(request('urun_adi'));
            request()->merge(['slug' => $data['slug']]);
        }
        $this->validate(request(), [
            'urun_adi' => 'required',
            'fiyati'       => 'required',
            'slug'         => (request('original_slug')!=request('slug') ? 'unique:urun,slug': '')
        ]);


        if($id>0) {
            $entry = Urun::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else {
            $entry = Urun::create($data);
        }

        return redirect()
            ->route('yonetim.urun.duzenle', $entry->id)
            ->with('mesaj', ($id>0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur', 'success');
    }

    public function sil($id){
        Kullanici::destroy($id);

        return redirect()
            ->route('yonetim.kullanici')
            ->with('mesaj','Kayıt Silindi')
            ->with('mesaj_tur', 'success');
    }
}
