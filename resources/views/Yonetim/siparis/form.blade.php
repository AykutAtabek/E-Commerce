@extends('yonetim.layouts.master')
@section('title','Sipariş Yönetimi')
@section('content')
    <h1 class="page-header">Sipariş Yönetimi</h1>


    <form method="post" action="{{route('yonetim.siparis.kaydet', @$entry->id)}}">
        {{csrf_field()}}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h2 class="sub-header">
            Ürün {{@$entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h2>

        @include('layouts.partials.errors')
        @include('layouts.partials.alert')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input type="text" class="form-control" id="adsoyad" name="adsoyad"
                           placeholder="Ad Soyad"
                           value="{{old('adsoyad', $entry->adsoyad)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon"
                               value="{{old('telefon', $entry->telefon)}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" id="adres" name="adres" placeholder="Adres"
                           value="{{old('adres', $entry->adres)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="durum">Durum</label>
                    <select name="durum" class="form-control" id="durum">
                        <option {{old('durum', $entry->durum)== 'Siparişiniz Alındı' ?
                    'selected' : ''}}>Siparişiniz Alındı</option>
                        <option {{old('durum', $entry->durum)== 'Ödeme Onaylandı' ?
                    'selected' : ''}}>Ödeme Onaylandı</option>
                        <option {{old('durum', $entry->durum)== 'Siparişiniz Hazırlanıyor' ?
                    'selected' : ''}}>Siparişiniz Hazırlanıyor</option>
                        <option {{old('durum', $entry->durum)== 'Siparişiniz Tamamlandı' ?
                    'selected' : ''}}>Siparişiniz Tamamlandı</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <h3>Sipariş (SP-{{$entry->id}})</h3>
    <table class="table table-bordererd table-hover">
        <tr>
            <th colspan="2">Ürün</th>
            <th>Tutar</th>
            <th>Adet</th>
            <th>Ara Toplam</th>
            <th>Durum</th>
        </tr>
        @foreach($entry->sepet->sepet_urunler as $sepet_urun)
            <tr>
                <td style="width: 120px">
                    <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                        <img src="{{$sepet_urun->urun->detay->urun_resmi!=null ?
                                    asset('uploads/urunler/'. $sepet_urun->urun->detay->urun_resmi)
                                    :'http://via.placeholder.com/120x100?text=UrunResmi'}}" style="height: 120px">
                    </a>
                </td>
                <td>
                    <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                        {{$sepet_urun->urun->urun_adi}}
                    </a>
                </td>
                <td>{{$sepet_urun->fiyati}}</td>
                <td>{{$sepet_urun->adet}}</td>
                <td>{{$sepet_urun->fiyati * $sepet_urun->adet}}</td>
                <td>{{$sepet_urun->durum}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-right">Toplam Tutar</td>
            <td colspan="2">{{$entry->siparis_tutari}}₺</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right">Toplam Tutar(KDV'li)</td>
            <td colspan="2">{{$entry->siparis_tutari*((100+config('cart.tax'))/100)}}₺</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right">Sipariş Durumu</td>
            <td colspan="2">{{$entry->durum}}</td>
        </tr>

    </table>
@endsection
