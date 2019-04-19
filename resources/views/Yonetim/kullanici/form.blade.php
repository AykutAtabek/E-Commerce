@extends('yonetim.layouts.master')
@section('title','Anasayfa')
@section('content')
    <h1 class="page-header"> Kullanıcı Yönetimi</h1>


    <form method="post" action="{{route('yonetim.kullanici.kaydet', @$entry->id)}}">
        {{csrf_field()}}

        <div class="pull-right">
        <button type="submit" class="btn btn-primary">
            {{@$entry->id > 0 ? "Güncelle" : "Kaydet" }}
        </button>
        </div>
        <h2 class="sub-header">
            Kullanıcı {{@$entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h2>

        @include('layouts.partials.errors')
        @include('layouts.partials.alert')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="Ad Soyad" value="{{
                    $entry->adsoyad}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{
                    $entry->email}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sifre">Şifre</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" id="adres" name="adres" placeholder="Adres" value="{{
                    $entry->detay->adres}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon" value="{{
                    $entry->detay->telefon}}">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="aktif_mi" value="1" {{$entry->aktif_mi ? 'checked' : ''}}> Aktif Mi
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="yonetici_mi" value="1" {{$entry->yonetici_mi ? 'checked' : ''}}> Yönetici Mi
            </label>
        </div>
    </form>
@endsection