@extends('yonetim.layouts.master')
@section('title','Ürün Yönetimi')
@section('content')
    <h1 class="page-header">Ürün Yönetimi</h1>


    <form method="post" action="{{route('yonetim.urun.kaydet', @$entry->id)}}"
          enctype="multipart/form-data">
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
                    <label for="urun_adi">Ürün Adı</label>
                    <input type="text" class="form-control" id="urun_adi" name="urun_adi"
                           placeholder="Ürün Adı"
                           value="{{old('urun_adi', $entry->urun_adi)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="hidden" name="original_slug" value="{{old('slug', $entry->slug)}}">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                               value="{{old('slug', $entry->slug)}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea type="text" class="form-control" id="aciklama" name="aciklama"
                              placeholder="Açıklama">{{old('aciklama', $entry->aciklama)}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fiyati">Fiyatı</label>
                    <input type="text" class="form-control" id="fiyati" name="fiyati"
                           placeholder="Fiyatı"
                           value="{{old('fiyati', $entry->fiyati)}}">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="goster_slider" value="0">
                <input type="checkbox" name="goster_slider" value="1"
                        {{old('goster_slider',$entry->detay->goster_slider) ?
                        'checked' : ''}}> Sliderda Göster
            </label>
            <label>
                <input type="hidden" name="goster_gunun_firsati" value="0">
                <input type="checkbox" name="goster_gunun_firsati" value="1"
                        {{old('goster_gunun_firsati',$entry->detay->goster_gunun_firsati) ?
                        'checked' : ''}}> Günün Fırsatında Göster
            </label>
            <label>
                <input type="hidden" name="goster_one_cikan" value="0">
                <input type="checkbox" name="goster_one_cikan" value="1"
                        {{old('goster_one_cikan',$entry->detay->goster_one_cikan) ?
                        'checked' : ''}}> Öne Çıkanlarda Göster
            </label>
            <label>
                <input type="hidden" name="goster_cok_satan" value="0">
                <input type="checkbox" name="goster_cok_satan" value="1"
                        {{old('goster_cok_satan',$entry->detay->goster_cok_satan) ?
                        'checked' : ''}}> Çok Satanlarda Göster
            </label>
            <label>
                <input type="hidden" name="goster_indirimli" value="0">
                <input type="checkbox" name="goster_indirimli" value="1"
                        {{old('goster_indirimli',$entry->detay->goster_indirimli) ?
                        'checked' : ''}}> İndirimlilerde Göster
            </label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategoriler">Kategoriler</label>
                    <select name="kategoriler[]" class="form-control" id="kategoriler" multiple>
                        @foreach($kategoriler as $kategori)
                            <option value="{{$kategori->id}}"
                                    {{collect(old('kategoriler',$urun_kategoriler))
                                    ->contains($kategori->id) ? 'selected' : ''}}>
                                {{$kategori->kategori_adi}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            @if($entry->detay->urun_resmi!=null)
                <img src="/uploads/urunler/{{$entry->detay->urun_resmi}}"
                style="height: 100px; margin-right: 20px;" class="thumbnail pull-left">
            @endif
            <label for="urun_resmi">Ürün Resmi</label>
            <input type="file" id="urun_resmi" name="urun_resmi">

        </div>
    </form>
@endsection
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.11.4/plugins/autogrow/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $(function () {
            $('#kategoriler').select2({
                placeholder: 'Lütfen Kategori Seçiniz'
            });
            var options = {
                uiColor: '#F5F5F5',
                language: 'tr',
                extraPlugins: 'autogrow',
                autoGrow_minHeight:250,
                autoGrow_maxHeight:600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('aciklama',options);
        });
    </script>
@endsection