<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Kullanıcı
Route::get("/getUser", "Api\KullaniciController@getUser");
Route::post("/postUser", "Api\KullaniciController@postUser");
Route::get("/getUserById/{id}", "Api\KullaniciController@getUserById");
Route::post("/updateUser","Api\KullaniciController@updateUser");
Route::get("/userLogin", "Api\KullaniciController@userLogin");
Route::delete('deleteUser/{id}',"Api\KullaniciController@deleteUser");

// KullanıcıDetay
Route::get("/getKullaniciDetay", "Api\KullaniciDetayController@getKullaniciDetay");
Route::post("/postKullaniciDetay", "Api\KullaniciDetayController@postKullaniciDetay");
Route::get("/getKullaniciDetayByKullaniciId/{kullanici_id}", "Api\KullaniciDetayController@getKullaniciDetayByKullaniciId");
Route::post("/updateKullaniciDetay","Api\KullaniciDetayController@updateKullaniciDetay");
Route::delete('deleteKullaniciDetay/{id}',"Api\KullaniciDetayController@deleteKullaniciDetay");

//Urun
Route::get("/getUrun", "Api\UrunController@getUrun");
Route::post("/postUrun", "Api\UrunController@postUrun");
Route::get("/getUrunById/{id}", "Api\UrunController@getUrunById");
Route::post("/updateUrun","Api\UrunController@updateUrun");
Route::delete('deleteUrun/{id}',"Api\UrunController@deleteUrun");
//Route::get('getUrunByKategori/{UrunKategoriID}',"Api\UrunController@getUrunByKategori");
Route::get('getUrunByUrunAdi',"Api\UrunController@getUrunByUrunAdi");

//Siparisler TEST EDİLMEDİ.
Route::get('/getSiparis', 'Api\SiparisController@getSiparis');
Route::post('/postSiparis', 'Api\SiparisController@postSiparis');
Route::get('/getSiparisById/{id}', 'Api\SiparisController@getSiparisById');
Route::post('/updateSiparis', 'Api\SiparisController@updateSiparis');
Route::post('/updateSiparisDurumID/{durum}/{id}', 'Api\SiparisController@updateSiparisDurumID');
Route::delete('/deleteSiparis/{id}', 'Api\SiparisController@deleteSiparis');
//Route::get('/getSiparisByKullaniciID/{KullaniciID}', 'Api\SiparisController@getSiparisByKullaniciID');
//Route::get('/getAktifSiparisByKullaniciID/{KullaniciID}', 'Api\SiparisController@getAktifSiparisByKullaniciID');
//Route::get('/getAllAktifSiparis', 'Api\SiparisController@getAllAktifSiparis');
//Route::get('/getSiparisBySubeID/{SubeID}', 'Api\SiparisController@getSiparisBySubeID');
Route::get('/getSiparisBySiparisDurum/{durum}', 'Api\SiparisController@getSiparisBySiparisDurumID');

//SepetUrun  TEST EDİLMEDİ.
Route::get('/getSepetUrun','Api\SepetController@getSepetUrun');
Route::post('/postSepetUrun','Api\SepetController@postSepetUrun');
Route::get('/getSepetUrunBySepet/{sepet_id}','Api\SepetController@getSepetUrunBySepet');
Route::post('/updateSepetUrun','Api\SepetController@updateSepetUrun');
Route::delete('/deleteSepet/{sepet_id}','Api\SepetController@deleteSepet');
Route::delete('/deleteSepetUrun/{id}','Api\SepetController@deleteSepetUrun');

//Sepet
Route::get('/getSepet', 'Api\SepetController@getSepet');
Route::post('/postSepet', 'Api\SepetController@postSepet');
Route::get('/getSepetByKullaniciId/{KullaniciID}', 'Api\SepetController@getSepetByKullaniciId');
Route::post('/updateSepet', 'Api\SepetController@updateSepet');
Route::delete('/deleteSepet/{id}', 'Api\SepetController@deleteSepet');
//Route::get('/aktifSepet/{kullanici_id}', 'Api\SepetController@aktifSepet');

//Kategori
Route::get("/getKategori", "Api\KategoriController@getKategori");
Route::post("/postKategori", "Api\KategoriController@postKategori");
Route::get("/getKategoriById/{id}", "Api\KategoriController@getKategoriById");
Route::post("/updateKategori","Api\KategoriController@updateKategori");
Route::delete('deleteKategori/{id}',"Api\KategoriController@deleteKategori");

//Market
Route::get("/getMarket", "Api\MarketController@getMarket");
Route::post("/postMarket", "Api\MarketController@postMarket");
Route::get("/getMarketById/{id}", "Api\MarketController@getMarketById");
Route::post("/updateMarket","Api\MarketController@updateMarket");
Route::delete('deleteMarket/{id}',"Api\MarketController@deleteMarket");

//Market-Urun
Route::get('/getMarketUrun','Api\MarketUrunController@getMarketUrun');
Route::post('/postMarketUrun','Api\MarketUrunController@postMarketUrun');
Route::get('/getMarketUrunByMarketId/{market_id}','Api\MarketUrunController@getMarketUrunByMarketId');
Route::get('/getMarketUrunByUrun/{urun_id}','Api\MarketUrunController@getMarketUrunByUrun');
Route::post('/updateMarketUrun','Api\MarketUrunController@updateMarketUrun');
Route::delete('/deleteMarketUrun','Api\MarketUrunController@deleteMarketUrun');
Route::get('/getUrunByMarketId/{market_id}','Api\MarketUrunController@getUrunByMarketId');
Route::get('/getUrunKategoriByMarketId/{market_id}/{kategori_id}','Api\MarketUrunController@getUrunKategoriByMarketId');
